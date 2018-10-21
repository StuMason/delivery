@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <form>
                        <!-- Address form -->
                        <h2>Address</h2>
                        <!-- full-name input-->
                        <div class="form-group">
                            <label class="control-label">Address Name</label>
                            <input id="name" name="name" type="text" placeholder="e.g. home, office" class="form-control">
                            <p class="form-text text-muted"></p>
                        </div>
                        <!-- line_1 input-->
                        <div class="form-group">
                            <label class="control-label">Address Line 1</label>
                            <input id="line_1" name="line_1" type="text" placeholder="5 Food Street" class="form-control">
                            <p class="form-text text-muted">Street address, P.O. box, company name, c/o</p>
                        </div>
                        <!-- line_2 input-->
                        <div class="form-group">
                            <label class="control-label">Address Line 2</label>
                            <input id="line_2" name="line_2" type="text" placeholder="Flat 3" class="form-control">
                            <p class="form-text text-muted">Apartment, suite , unit, building, floor, etc.</p>
                        </div>
                        <!-- line_3 input-->
                        <div class="form-group">
                            <label class="control-label">City / Town</label>
                            <input id="line_3" name="line_3" type="text" placeholder="Folkestone" class="form-control">
                            <p class="form-text text-muted"></p>
                        </div>
                        <!-- post_code input-->
                        <div class="form-group">
                            <label class="control-label">Post Code</label>
                            <input id="post_code" name="post_code" type="text" placeholder="Post code" class="form-control">
                            <p class="form-text text-muted"></p>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add Location" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
