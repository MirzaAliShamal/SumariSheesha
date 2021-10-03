<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\PaypalTransaction;
use App\Models\Order;
use App\Models\OrderItem;
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
        $total = strval(Cart::total());
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
                $content = Cart::content();
                $total = strval(Cart::total());
                $total = str_replace(',','',$total);
                    // dd($total);
                $order = new Order;
                $order->user_id = auth()->user()->id;
                $order->total = $total;
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
                }
                if($item){
                    Cart::destroy();
                }
                // PaypalTransaction::Create([
                //     'paypal_id' => $result->id,
                //     'payer_id' => $info->payer_id,
                //     'first_name' => $info->first_name,
                //     'last_name' => $info->last_name,
                //     'email' => $info->email,
                //     'font_name' => $data['fonts'],
                //     'color' => $data['color'],
                //     'size' => $data['size'],
                //     'qty' => $data['qty'],
                //     'text_typed' => $data['text'],
                // ]);

            return redirect()->route('cart')->with('success','purchase successfull');
        } else {
            return redirect()->route('cart')->with('error','Payment didn\'t go through, Try Again! ');
        }
    }
}