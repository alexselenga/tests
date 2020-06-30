<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Quizer Test</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#" data-toggle="modal" data-target="#addPhone">Add your phone number</a>
        <a class="p-2 text-dark" href="#" data-toggle="modal" data-target="#retrievePhone">Retrieve your phone number</a>
    </nav>
</div>

<div class="container">
    <h3>Emails with phones:</h3>
    <div id="emails"></div>
</div>

<div class="modal fade" id="addPhone" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="form1">
                    <fieldset>
                        <legend>Add your phone number</legend>

                        <div class="option">
                            Option 1. Add your phone number
                        </div>

                        <div class="form-group">
                            <label for="phone1">Enter your PHONE:</label>
                            <input type="text" class="form-control" id="phone1" name="phone1">
                        </div>
                        <div class="form-group">
                            <label for="email1">Add your email:</label>
                            <input type="email" class="form-control" id="email1" name="email1">
                        </div>

                        <div class="caption">
                            You will be able to retrieve your phone number later on using your e-mail.
                        </div>

                        <button type="submit" class="btn btn-sm btn-light btn-outline-dark" data-dismiss="modal">submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="retrievePhone" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="form2">
                    <fieldset>
                        <legend>Retrieve your phone number</legend>

                        <div class="option">
                            Option 2. Retrieve your phone number
                        </div>

                        <div class="form-group">
                            <label for="email2">Enter your email:</label>
                            <input type="email" class="form-control" id="email2" name="email2">
                        </div>

                        <div class="caption">
                            The phone number will e-mailed to you.
                        </div>

                        <button type="submit" class="btn btn-sm btn-light btn-outline-dark" data-dismiss="modal">submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
