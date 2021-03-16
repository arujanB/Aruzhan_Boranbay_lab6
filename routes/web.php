<?php
use App\Student;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mampex', function () {
    return view('ex');
});

Route::get('/insert', function(){
	DB::insert('insert into students(id, name, date_of_birth, GPA, advisor) values(?,?,?,?,?)', [2, "Alnur", '2002-01-22', "3.99", "Zhangir Rayev"]);
});

Route::get('/select', function(){
	$result = DB::select('select * from students where id = ?', [1, 2]);
	foreach($result as $stu){
		echo "name is ".$stu->name;
		echo "<br>";
		echo "id is ".$stu->id;
	}
});

Route::get('/update', function(){
	$update = DB::update('update students set advisor = "Zhangr Rayev" where id = ?', [2]);
	return $update;
});

Route::get('/delete', function(){
	$deleted = DB::delete('delete from students where id = ?', [3]);
	return $dalated;
});

//use App\Student;
Route::get('/model', function(){
	$students =Student::all();
	foreach ($students as $student) {
		# code...
		echo $student -> name;
		echo "<br>";
	}
});

Route::get('/model1', function(){
	$students = Student::find(2);
	return $students->name;
});

Route::get('/model12', function(){
	$students = Student::find(1);
	return $students->name;
});

Route::get('/model21', function(){
	$students=Student::where('name', 'Alnur')->value('id');
	return $students;
});

//use App\Student;
Route::get('/insert2', function(){
	$post = new Student;
	$post->id = 9;
	$post->name ='Aruzhan';
	$post->date_of_birth = '2000-10-11';
	$post->GPA = '3.75';
	$post->advisor = 'Marzhan teacher';
	$post->save();
});

Route::get('/delete2', function(){
	$post = Student::find(3);
	$post->name='Arlan';
	$post->save();
});

Route::get('/delete22', function(){
	$post = Student::find(3);
	$post->delete();
});

Route::get('/destroy', function(){
	Student::destroy(3);
});

Route::get('/destroy2', function(){
	Student::destroy([4, 5]);
});

Route::get('/deleteT', function(){
	Student::find(7)->delete();
});

Route::get('/trash', function(){
	$post = Student::withTrashed()->where('id', 9)->get();
	return $post;
});