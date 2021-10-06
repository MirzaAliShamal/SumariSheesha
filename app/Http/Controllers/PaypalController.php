<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
// use App\Models\PaypalTransaction;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Booking;
use App\Models\Earning;
// Paypal includes
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Rest\ApiContext;
use PayPal\Api\Transaction;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\Details;
use PayPal\Api\Payout;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use Redirect;
use Session;
use Auth;
use URL;
use Gloudemans\Shoppingcart\Facades\Cart;


class PaypalController extends Controller
{
    private $_api_context;

    public function buildpaypal()
    {
        $paypal_conf = [];
        $paypal_conf['client_id'] = env('PAYPAL_CLIENT_ID');
        $paypal_conf['secret'] = env('PAYPAL_SECRET_ID');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));
        $paypal_conf = \Config::get('paypal');
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function price(Request $req)
    {
        if($req->booking == 'booking'){
            $total = strval(Cart::instance('booking')->total());
        }else{
            $total = strval(Cart::instance('product')->total());
        }
        $total = str_replace(',','',$total);
        $total = intval($total);
        $this->buildpaypal();
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1')
            /* item name */
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($total);
        /* unit price */
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('paypal.status'))
            /* Specify return URL */
            ->setCancelUrl(URL::route('paypal.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /* dd($payment->create($this->_api_context));exit; */
        try {
            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                return redirect()->back()->with('error', 'Some error occur, sorry for inconvenient');
              // return Redirect::route('user.dashboard')->with('message', 'Connection timeout');
            } else {
                return redirect()->back()->with('error', 'Some error occur, sorry for inconvenient');
              // return Redirect::route('user.dashboard')->with('message', 'Some error occur, sorry for inconvenient');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /* add request to session */
        Session::put('data', $req->except('_token'));

        /* add payment ID to session */
        Session::put('paypal_payment_id', $payment->getId());
        Session::put('paypal_detail', $payment);
        if (isset($redirect_url)) {
            /* redirect to paypal */
            return Redirect::away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return redirect()->back();
    }

    public function getPayPalStatus(Request $request)
    {
        $this->buildpaypal();

        /* Get the payment and group IDs before session clear */
        $payment_id = Session::get('paypal_payment_id');
        $data = Session::get('data');
        /* clear the session payment and group IDs */
        Session::forget('paypal_payment_id');
        Session::forget('data');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            //return Redirect::route('user.dashboard')->with('message', 'Payment failed');
            return redirect()->back()->with('error', 'Payment failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        /**Execute the payment **/

        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
                $info = $result->payer->payer_info;
                if( in_array('booking',$data) ){
                    $content = Cart::instance('booking')->content();
                    $total = strval(Cart::instance('booking')->total());
                    $total = str_replace(',','',$total);
                    foreach($content as $list){
                        $book = Booking::orderBy('id', 'DESC')->first();
                        $booking = new Booking();
                        if( is_null($book) ){
                            $booking->uuid = 1001;
                        }
                        else{
                            $booking->uuid = $book->uuid + 1;
                        }
                        $booking->user_id = auth()->user()->id;
                        $booking->brand_product_id = $list->id;
                        $booking->amount = $list->price;
                        $booking->note = $data['additional_note'];
                        $booking->save();
                        if($booking){
                            $earning = new Earning();
                            $earning->logable_type = 'App\Models\Booking';
                            $earning->logable_id = $booking->id;
                            $earning->payer_id = $result->id;
                            $earning->amount = $booking->amount;
                            $earning->payment_method = 'Paypal';
                            $earning->save();
                        }

                    }
                    if($booking){
                        Cart::instance('booking')->destroy();
                    }

                }else{
                    $content = Cart::instance('product')->content();
                    $total = strval(Cart::instance('product')->total());
                    $total = str_replace(',','',$total);
                        // dd($total);
                    $ordList =Order::orderBy('id','DESC')->first();
                    $order = new Order;
                    if( is_null($ordList) ){
                        $order->uuid = 1001;
                    }
                    else{
                        $order->uuid = $ordList->uuid + 1;
                    }
                    $order->user_id = auth()->user()->id;
                    $order->total = $total;
                    $order->note = $data['additional_note'];
                    $order->save();
                    if($order){
                        foreach($content as $list){
                            $item = new OrderItem();
                            $item->order_id = $order->id;
                            $item->product_id = $list->id;
                            $item->quantity = $list->qty;
                            $item->price = $list->price;
                            $item->total = $list->price * $list->qty;
                            $item->save();
                        }
                        $earning = new Earning();
                        $earning->logable_type = 'App\Models\Order';
                        $earning->logable_id = $order->id;
                        $earning->payer_id = $result->id;
                        $earning->amount = $order->total;
                        $earning->payment_method = 'Paypal';
                        $earning->save();
                    }

                    if($item){
                        Cart::instance('product')->destroy();
                    }
                }

                $user = User::find(auth()->user()->id);
                if(!$user->phone){
                    $user->phone = $data['phone'];
                }
                $user->name = $data['name'];
                $user->save();
                if($user){
                    $address = new Address();
                }else{
                    $address = $user->address;
                }
                $address->address = $data['address'];
                $address->user_id = $user->id;
                $address->city = $data['city'];
                $address->state = $data['state'];
                $address->zip_code = $data['zipcode'];
                $address->save();

            return redirect()->route('home')->with('success','purchase successfull');
        } else {
            return redirect()->route('home')->with('error','Payment didn\'t go through, Try Again! ');
        }
    }
}
