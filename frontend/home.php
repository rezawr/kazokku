<div class="col-12 mt-3">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Home
            <button type="button" class="btn btn-sm btn-primary" id="button-href" href="add">Add Data</button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("backend/get-data.php");
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>