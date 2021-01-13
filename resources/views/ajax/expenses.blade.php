<div><b>Amount:</b> <span class="currency">{{ $expense->amount }}</span> Rwf.</div>
<div><b>Why: </b>{{ $expense->why }}.</div>
<div><b>Details: </b>{{ $expense->details }}.</div>
<br>
<h5 class="text-center">
    <span class="badge badge-secondary">
        <div>Taken At {{ \Carbon\Carbon::parse($expense->created_at)->format('Y-M-d') }}</div>
    </span>
</h5>