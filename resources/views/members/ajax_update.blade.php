<form action="{{  url('/members/'.$member->id) }}" method="post">
    {{ method_field("PUT") }}
    <div class="form-row">
        {{ csrf_field() }}
        <div class="form-group col-md-8">
            <label for="name">Member Names</label>
            <input type="text" name="name" id="name" value="{{ $member->name }}" class="form-control"
                   aria-describedby="helpId" required>
            <small id="helpId" class="text-muted">Full Names Are Required</small>
        </div>
        <div class="form-group col-md-4">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" id="gender" required>
                <option value="">Select Gender</option>
                <option value="1">Female</option>
                <option value="2">Male</option>
            </select>
            <small id="helpId" class="form-text text-muted">Gender Is Required</small>
        </div>


    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control mob_no" data-mask value="{{ $member->phone }}" name="phone"
                   id="phone"
                   aria-describedby="helpId" required>
            <small id="helpId" class="form-text text-muted">Telephone Contacts is required</small>
        </div>
        <div class="form-group col-md-5">
            <label for="phone">Date Of Birth</label>
            <input type="date" class="form-control" value="{{ $member->dob }}" name="dob" id="phone"
                   aria-describedby="helpId" required>
            <small id="helpId" class="form-text text-muted">Date Of Birth Is Required</small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="cell">Cell</label>
            <input type="text" class="form-control" value="{{ $member->cell }}" name="cell" id="cell"
                   aria-describedby="helpId" required>
            <small id="helpId" class="form-text text-muted">Cell Name is required</small>
        </div>
        <div class="form-group col-md-5">
            <label for="village">Village</label>
            <input type="text" class="form-control" value="{{ $member->village }}" name="village" id="village"
                   aria-describedby="helpId" required>
            <small id="helpId" class="form-text text-muted">Village Name Is Required Is Required</small>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info btn-raised btn-block">Update A Member</button>
    </div>
</form>