@extends('admin.main')

@section('content')
<div class="container" style="font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
    <div style="background-color: #fff; padding: 10px; border-radius: 5px;">
        <p style="font-size: 16px; color: #333;">Tổng số vé hiện có: {{ $totalTickets }}</p>
        <p style="font-size: 16px; color: #333;">Tổng tiền: {{ $totalAmount }} đ</p>
    </div>
</div>

@endsection