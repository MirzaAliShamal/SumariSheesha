@extends('mail.layouts')

@section('mail-content')
    <tr>
        <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
            Hello {{ $user->name }},
        </td>
    </tr>
    <tr>
        <td style="padding: 15px 24px 15px; color: #8492a6;">
            Your booked item has been delivered successfully, hope to see you again.
        </td>
    </tr>

    <tr>
        <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
            Booking No: <a href="{{ route('user.dashboard.booking') }}" target="_blank">#BO{{ $details->uuid }}</a>
        </td>
    </tr>

    <tr>
        <td style="padding: 15px 24px;">
            <a href="{{ route('user.dashboard.booking') }}" style="padding: 8px 20px; outline: none; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s; font-weight: 600; border-radius: 6px; background-color: #f85c70; border: 1px solid #f85c70; color: #ffffff;">Dashboard</a>
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
            <a href="{{ route('user.dashboard.booking') }}" target="_blank" style="text-decoration: underline; color: #3869d4;">{{ route('user.dashboard.booking') }}</a>
        </td>
    </tr>
@endsection
