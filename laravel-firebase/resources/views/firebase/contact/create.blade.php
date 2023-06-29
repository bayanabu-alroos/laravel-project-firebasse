@extends('firebase.app')

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Contact
                        <a href="{{'contacts'}}" class="btn btn-sm btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('add-contact')}}" method="POST">
                        @csrf
                        <div class="from-group mt-3">
                            <label>First Name </label>
                            <input type="text" name="first_name"  class="form-control">
                        </div>
                        <div class="from-group mt-3">
                            <label>Last Name </label>
                            <input type="text" name="last_name"  class="form-control">
                        </div>
                        <div class="from-group mt-3">
                            <label>Phone Number</label>
                            <input type="text" name="phone"  class="form-control">
                        </div>
                        <div class="from-group mt-3">
                            <label>E-mail Address </label>
                            <input type="text" name="email"  class="form-control">
                        </div>
                        <div class="from-group mt-3">
                            <label>Message </label>
                            <textarea type="text" name="message"  class="form-control"></textarea>
                        </div>
                        <div class="from-group mt-3">
                            <button class="btn btn-primary" type="submit"> Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
