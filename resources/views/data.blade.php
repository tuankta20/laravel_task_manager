$tasks = new Tasks();
$tasks->title = $request->title;
$tasks->content = $request->contents;

$file = $request->inputFile;
if (!$request->hasFile('inputFile')) {
$tasks->images = $file;
} else {

$fileExtension = $file->getClientOriginalExtension();
$fileName = $request->inputFileName;

$newFileName = "$fileName.$fileExtension";

$request->file('inputFile')->storeAs('public/images', $newFileName);

$tasks->images = $newFileName;
}
$tasks->save();

return redirect()->route('task');
