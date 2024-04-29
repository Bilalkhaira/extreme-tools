<div class="row">
    <div class="col-lg-12 mb-5">
        <label> <b>Choose Plan:</b></label>
    </div>
</div>
<div class="row mb-5">

    <div class="col-md-6">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" @if ($plan->subscription_interval == 'monthly') checked @endif class="form-check-input"
                    name="plan" value="monthly">Monthly
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" @if ($plan->subscription_interval == 'yearly') checked @endif class="form-check-input"
                    name="plan" value="yearly">Yearly
            </label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-5">
        <label> <b>Name:</b></label>
        <input type="text" name="title" value="{{ $plan->name ?? '' }}" class="form-control"
            placeholder="Enter Name" required>
    </div>
    <div class="col-md-6">
        <label> <b>Plan Level:</b></label>
        <select class="form-control" name="plan_level" id="">
            <option>Select Plan</option>
            <option @if ($plan->level == '1') selected @endif value="1">Level One</option>
            <option @if ($plan->level == '2') selected @endif value="2">Level Two</option>
            <option @if ($plan->level == '3') selected @endif value="3">Level Three</option>
        </select>
    </div>
</div>
<input type="hidden" id="updateId" name="updateId" value="{{ $plan->id ?? '' }}">


<div class="row">
    <div class="col-lg-6 mb-5">
        <label> <b>Plan Original Price:</b></label>
        <input type="number" name="price" class="form-control" value="{{ $plan->original_price ?? '' }}"
            placeholder="Enter Price">
    </div>
    <div class="col-lg-6 mb-5">
        <label> <b>Plan Discounted Price:</b></label>
        <input type="number" name="discounted_price" value="{{ $plan->discounted_price ?? '' }}" class="form-control"
            placeholder="Enter Price">
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label for=""><b>Features</b></label>
    </div>
</div>
<div class="row append_col">
    @if (!empty($plan->features))
        @foreach (json_decode($plan->features) as $feature)
            <div class="row">
                <div class="col-md-11 mb-5">
                    <textarea name="features[]" col="12" rows="1" class="form-control" placeholder="Enter Plan Feature"
                        required>{{ $feature }}</textarea>
                </div>
                <div class="col-md-1 mb-5">
                    <span class="trash_btn"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        @endforeach
    @endif
</div>
