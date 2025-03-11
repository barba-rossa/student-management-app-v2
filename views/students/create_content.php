<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Add New Student</h5>
    </div>
    <div class="card-body">
        <form action="/students/store" method="POST">
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Student</button>
            <a href="/students/index" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>