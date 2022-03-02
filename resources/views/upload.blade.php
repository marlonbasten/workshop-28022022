<form action="{{ route('handleUpload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Excel-Datei</label>
    <br>
    <input type="file" name="file" id="file">
    <br><br>
    <input type="submit" value="Excel importieren">
</form>