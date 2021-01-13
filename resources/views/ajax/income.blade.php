<div><b>Amount:</b> <span class="currency">{{ $income->amount }}</span> Rwf.</div>
<div><b>From: </b>{{ $income->why }}.</div>
<div><b>Details: </b>{{ $income->details }}.</div>
<br>
<h5 class="text-center">
    <span class="badge badge-secondary">
        <div>Taken At {{ \Carbon\Carbon::parse($income->created_at)->format('Y-M-d') }}</div>
    </span>
</h5>