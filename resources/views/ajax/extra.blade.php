<form method="post" action="{{ url('/extra') }}">
    {{ csrf_field() }}
    <input type="hidden" name="contribution_id" value="{{ $contribution }}">
    <div class="form-group">
        <label for="amount">Amount (Rwf)</label>
        <input type="number"  class="form-control " required
               id="amount" name="amount" value="{{ $old }}">
    </div>
    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
</form>