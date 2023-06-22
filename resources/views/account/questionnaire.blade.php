<h1>Questionnaire</h1>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<form method="POST" action="/account/questionnaire">
    @csrf

    <!-- Add your questionnaire fields here -->

    <div>
        <button type="submit">Submit Questionnaire</button>
    </div>
</form>
