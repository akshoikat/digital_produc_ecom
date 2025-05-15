@extends('web.layouts.app')
@section('title', 'Payment Method')

@section('content')
<style>
    body {
        background: url('https://images.unsplash.com/photo-1503264116251-35a269479413?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
        background-size: cover;
    }

    .glass-card {
        background-color: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 30px;
        color: white;
        height: 100%;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }
    p {
        margin-bottom: 0px!important;
       
    }
    .light-card {
        background-color: #ffffffd9;
        border-radius: 12px;
        padding: 25px;
        color: #000;
        height: 100%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .form-check img {
        max-height: 50px;
        object-fit: contain;
    }

    @media (max-width: 768px) {
        .glass-card,
        .light-card {
            margin-bottom: 30px;
            height: auto !important;
        }
    }
</style>

<div class="container py-5 mt-5">
    <form action="" method="POST">
        @csrf
        <div class="row g-4">
            <!-- Right: Product Info -->
            <div class="col-12 col-lg-4">
                <div class="glass-card h-auto d-flex flex-column justify-content-center">
                    <h2 class="mb-4 border-bottom pb-2">{{ $product->product_name }}</h2>

                    <div class="text-sm text-white">
                        <p><span class="fw-bold text-info">🎮 Game:</span> {{ $product->game->name }}</p>
                        <p><span class="fw-bold text-success">💰 Amount:</span> {{ $product->amount }}</p>
                        <p><span class="fw-bold text-warning">💵 Price:</span> {{ $product->price }} BDT</p>
                        <p>
                            <span class="fw-bold text-danger">📋 Instructions:</span><br>
                            <span class="whitespace-pre-line">{{ $product->instructions }}</span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Left: Payment Method -->
            <div class="col-12 col-lg-8">
                <div class="glass-card">
                    <h3 class="mb-4">PAYMENT METHOD</h3>

                    <div class="row row-cols-3 g-2 mb-4">
                        @php
                            $paymentOptions = [
                                ['id' => 'bkash', 'image' => 'bikash.svg'],
                                ['id' => 'nagad', 'image' => 'nogod.png'],
                                ['id' => 'rocket', 'image' => 'roket3.png'],
                                ['id' => 'visa_card', 'image' => 'visa.webp'],
                                ['id' => 'master_card', 'image' => 'mastercard.webp'],
                                ['id' => 'paypal', 'image' => 'paypal.webp'],
                                ['id' => 'amarican_express', 'image' => 'american-express.webp'],
                            ];
                        @endphp

                        @foreach ($paymentOptions as $index => $method)
                            <div class="col text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="{{ $method['id'] }}" value="{{ $method['id'] }}" @if($index === 0) checked @endif>
                                    <label class="form-check-label" for="{{ $method['id'] }}">
                                        <img src="{{ asset('fontend/images/payments/' . $method['image']) }}" alt="{{ $method['id'] }}" class="img-fluid">
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Instructions -->
                    <div class="bg-light text-dark p-3 border rounded mb-4" style="font-size: 15px;" id="paymentInstructions"></div>

                    <!-- Input Fields -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" name="email" required></div>
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Game UID" name="game_uid" required></div>
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Sender Number" name="sender_number" required></div>
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Transaction ID" name="transaction_id" required></div>
                    </div>

                    <!-- Hidden Inputs -->
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="game_id" value="{{ $product->game->id }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">

                    <!-- Submit Button -->
                    <div id="submitSection">
                        <button type="submit" class="btn btn-success w-100">PLACE ORDER</button>
                    </div>
                </div>
            </div>

            
        </div>
    </form>
</div>

<!-- Payment Instruction JS -->
<script>
    const instructionBox = document.getElementById('paymentInstructions');

    const instructions = {
        bkash: `<p>📌 বিকাশে টাকা সেন্ড করতে নিচের স্টেপ সমূহ ফলো করুন:</p>
                <p>১. *247# ডায়াল করুন বা অ্যাপে যান।</p>
                <p>২. "Send Money" ক্লিক করুন।</p>
                <p>৩. প্রাপক: 01888794781</p>
                <p>৪. পরিমাণ ও রেফারেন্স দিন (1234)।</p>
                <p>৫. পিন দিয়ে সম্পন্ন করুন।</p>
                <p>৬. নিচে Transaction ID ও Sender Number দিন।</p>
                <p>৭. "PLACE ORDER" বাটনে ক্লিক করুন।</p>`,

        nagad: `<p>📌 নগদে টাকা পাঠাতে:</p>
                <p>১. *167# ডায়াল করুন বা অ্যাপে যান।</p>
                <p>২. "Send Money" ক্লিক করুন।</p>
                <p>৩. প্রাপক: 01888794781</p>
                <p>৪. পরিমাণ ও রেফারেন্স (1234)।</p>
                <p>৫. পিন দিন ও নিচে Transaction ID লিখুন।</p>`,

        rocket: `<p>📌 রকেট পাঠাতে:</p>
                <p>১. *322# ডায়াল করুন বা অ্যাপে যান।</p>
                <p>২. "Send Money" ক্লিক করুন।</p>
                <p>৩. প্রাপক: 01742853815</p>
                <p>৪. রেফারেন্স: 1234</p>
                <p>৫. Transaction ID ও Sender Number দিন।</p>`,

        visa_card: `<p>UNAVAILABLE RIGHT NOW</p>`,
        master_card: `<p>UNAVAILABLE RIGHT NOW</p>`,
        paypal: `<p>UNAVAILABLE RIGHT NOW</p>`,
        amarican_express: `<p>UNAVAILABLE RIGHT NOW</p>`,
    };

    instructionBox.innerHTML = instructions['bkash'];

    document.querySelectorAll('input[name="paymentMethod"]').forEach(radio => {
        radio.addEventListener('change', function () {
            instructionBox.innerHTML = instructions[this.value];
        });
    });

    $(document).ready(function () {
        function toggleSubmitButton(method) {
            const hiddenMethods = ['visa_card', 'master_card', 'paypal', 'amarican_express'];
            $('#submitSection').toggle(!hiddenMethods.includes(method));
        }

        toggleSubmitButton($('input[name="paymentMethod"]:checked').val());

        $('input[name="paymentMethod"]').change(function () {
            toggleSubmitButton($(this).val());
        });
    });
</script>
@endsection
