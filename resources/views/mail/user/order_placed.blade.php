@extends('mail.layouts')

@section('mail-content')
    <tr>
        <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
            Hello {{ $user->name }},
        </td>
    </tr>
    <tr>
        <td style="padding: 15px 24px 15px; color: #8492a6;">
            Congratulations your order has been placed. Your order will be delivered as soon as possible.
        </td>
    </tr>

    <tr>
        <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
            Order No: <a href="{{ route('user.dashboard.order') }}" target="_blank">#PO{{ $details->uuid }}</a>
        </td>
    </tr>

    <tr>
        <td style="padding: 15px 24px;">
            <a href="{{ route('user.dashboard.order') }}" style="padding: 8px 20px; outline: none; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s; font-weight: 600; border-radius: 6px; background-color: #f85c70; border: 1px solid #f85c70; color: #ffffff;">Dashboard</a>
        </td>
    </tr>

    <tr>
        <td style="padding: 15px 24px 15px; color: #8492a6;">
            {{ config("app.name") }} <br> Support Team
        </td>
    </tr>

    <tr>
        <td style="padding: 15px 24px 0; color: #8492a6; font-size: 13px; font-weight: 400;">
            If you’re having trouble clicking the "Dashboard" button, copy and paste the URL below into your web browser:
            <a href="{{ route('user.dashboard.order') }}" target="_blank" style="text-decoration: underline; color: #3869d4;">{{ route('user.dashboard.order') }}</a>
        </td>
    </tr>
@endsection