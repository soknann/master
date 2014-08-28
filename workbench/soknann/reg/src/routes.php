<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/21/14
 * Time: 12:45 PM
 * To change this template use File | Settings | File Templates.
 */

Route::get('/', function () {
    return Redirect::route('reg.home');
});
Route::group(array('prefix' => 'reg', 'before' => 'guest.reg'), function () {
    Route::get('login', array(
        'as' => 'reg.login',
        'uses' => 'Soknann\Reg\HomeController@getLogin'
    ));
    Route::post('login', 'Soknann\Reg\HomeController@postLogin');
});

Route::group(array('prefix' => 'reg', 'before' => 'auth.reg'), function () {
    /*
     * Start user
     */
    Route::get('home', array(
        'as' => 'reg.home',
        'uses' => 'Soknann\Reg\HomeController@getHome',
    ));
    Route::get('logout', array(
        'as' => 'reg.logout',
        'uses' => 'Soknann\Reg\HomeController@getLogout',
    ));
    Route::get('user', array(
        'as' => 'reg.user.index',
        'uses' => 'Soknann\Reg\UserController@index',
    ));
    Route::post('user', array(
        'as' => 'reg.user.store',
        'uses' => 'Soknann\Reg\UserController@store',
    ));
    Route::get('user/add', array(
        'as' => 'reg.user.add',
        'uses' => 'Soknann\Reg\UserController@add',
    ));

    Route::get('user/{id}/edit', array(
        'as' => 'reg.user.edit',
        'uses' => 'Soknann\Reg\UserController@edit',
    ));

    Route::put('user/update/{id}', array(
        'as' => 'reg.user.update',
        'uses' => 'Soknann\Reg\UserController@update',
    ));

    Route::delete('user/destroy/{id}', array(
        'as' => 'reg.user.destroy',
        'uses' => 'Soknann\Reg\UserController@destroy',
    ));

    /*
     * End user
     */

    /*
     * Start Student List
     */

    Route::get('student', array(
        'as' => 'reg.student.index',
        'uses' => 'Soknann\Reg\StudentController@index',
    ));

    Route::post('student', array(
        'as' => 'reg.student.store',
        'uses' => 'Soknann\Reg\StudentController@store',
    ));

    Route::get('student/add', array(
        'as' => 'reg.student.add',
        'uses' => 'Soknann\Reg\StudentController@add',
    ));

    Route::get('student/{id}/edit', array(
        'as' => 'reg.student.edit',
        'uses' => 'Soknann\Reg\StudentController@edit',
    ));

    Route::put('student/update/{id}', array(
        'as' => 'reg.student.update',
        'uses' => 'Soknann\Reg\StudentController@update',
    ));

    Route::delete('student/destroy/{id}', array(
        'as' => 'reg.student.destroy',
        'uses' => 'Soknann\Reg\StudentController@destroy',
    ));

    Route::get('student/show/{id}', array(
        'as' => 'reg.student.show',
        'uses' => 'Soknann\Reg\StudentController@show',
    ));

    /*
     * End Student List
     */

    /*
     * Start Teacher List
     */

    Route::get('teacher', array(
        'as' => 'reg.teacher.index',
        'uses' => 'Soknann\Reg\TeacherController@index',
    ));

    Route::post('teacher', array(
        'as' => 'reg.teacher.store',
        'uses' => 'Soknann\Reg\TeacherController@store',
    ));

    Route::get('teacher/add', array(
        'as' => 'reg.teacher.add',
        'uses' => 'Soknann\Reg\TeacherController@add',
    ));

    Route::get('teacher/{id}/edit', array(
        'as' => 'reg.teacher.edit',
        'uses' => 'Soknann\Reg\TeacherController@edit',
    ));

    Route::put('teacher/update/{id}', array(
        'as' => 'reg.teacher.update',
        'uses' => 'Soknann\Reg\TeacherController@update',
    ));

    Route::delete('teacher/destroy/{id}', array(
        'as' => 'reg.teacher.destroy',
        'uses' => 'Soknann\Reg\TeacherController@destroy',
    ));

    Route::get('teacher/show/{id}', array(
        'as' => 'reg.teacher.show',
        'uses' => 'Soknann\Reg\TeacherController@show',
    ));

    /*
     * End Teacher List
     */

    /*
     * Start Subject
     */

    Route::get('subject', array(
        'as' => 'reg.subject.index',
        'uses' => 'Soknann\Reg\SubjectController@index',
    ));

    Route::post('subject', array(
        'as' => 'reg.subject.store',
        'uses' => 'Soknann\Reg\SubjectController@store',
    ));

    Route::get('subject/add', array(
        'as' => 'reg.subject.add',
        'uses' => 'Soknann\Reg\SubjectController@add'
    ));

    Route::get('subject/{id}/edit', array(
        'as' => 'reg.subject.edit',
        'uses' => 'Soknann\Reg\SubjectController@edit'
    ));

    Route::put('subject/update/{id}', array(
        'as' => 'reg.subject.update',
        'uses' => 'Soknann\Reg\SubjectController@update'
    ));

    Route::delete('subject/destroy/{id}', array(
        'as' => 'reg.subject.destroy',
        'uses' => 'Soknann\Reg\SubjectController@destroy'
    ));

    Route::get('subject/show/{id}', array(
        'as' => 'reg.subject.show',
        'uses' => 'Soknann\Reg\SubjectController@show'
    ));

    /*
     * End Subject
     */

    /*
     * Start Time
     */

    Route::get('time', array(
       'as' => 'reg.time.index',
       'uses' => 'Soknann\Reg\TimeController@index',
    ));

    Route::post('time', array(
       'as' => 'reg.time.store',
       'uses' => 'Soknann\Reg\TimeController@store',
    ));

    Route::get('time/add', array(
       'as' => 'reg.time.add',
       'uses' => 'Soknann\Reg\TimeController@add'
    ));

    /*
     * End Time
     */

    /*
    * Start Course
    */

    Route::get('course', array(
        'as' => 'reg.course.index',
        'uses' => 'Soknann\Reg\CourseController@index'
    ));

    Route::post('course', array(
        'as' => 'reg.course.store',
        'uses' => 'Soknann\Reg\CourseController@store'
    ));

    Route::get('course/add', array(
        'as' => 'reg.course.add',
        'uses' => 'Soknann\Reg\CourseController@add'
    ));

    Route::get('course/{id}/edit', array(
        'as' => 'reg.course.edit',
        'uses' => 'Soknann\Reg\CourseController@edit'
    ));

    Route::put('course/update/{id}', array(
        'as' => 'reg.course.update',
        'uses' => 'Soknann\Reg\CourseController@update'
    ));

    Route::delete('course/destroy/{id}', array(
        'as' => 'reg.course.destroy',
        'uses' => 'Soknann\Reg\CourseController@destroy'
    ));

    Route::get('course/{id}/show', array(
        'as' => 'reg.course.show',
        'uses' => 'Soknann\Reg\CourseController@show'
    ));





    /*
    * End Course
    */

    Route::get('rptStudent', array(
        'as' => 'reg.student.rpt',
        'uses' => 'Soknann\Reg\StudentController@reportstudent',
    ));


    /*
     * Start Report Student
     */
    Route::get('rpt/student', array(
        'as' => 'reg.rpt_student.index',
        'uses' => 'Soknann\Reg\RptStudentController@index',
    ));

    Route::post('rpt/student', array(
        'as' => 'reg.rpt_student.report',
        'uses' => 'Soknann\Reg\RptStudentController@report',
    ));

    /*
    * End Report Student
    */

});

/*
 * DataTable Index
 */
Route::get('api/user', array(
    'as' => 'api.user',
    'uses' => 'Soknann\Reg\UserController@getDatatable'
));

Route::get('api/student', array(
    'as' => 'api.student',
    'uses' => 'Soknann\Reg\StudentController@getDatatable'
));

Route::get('api/teacher', array(
    'as' => 'api.teacher',
    'uses' => 'Soknann\Reg\TeacherController@getDatatable'
));

Route::get('api/subject', array(
    'as' => 'api.subject',
    'uses' => 'Soknann\Reg\SubjectController@getDatatable'
));

Route::get('api/course', array(
    'as' => 'api.course',
    'uses' => 'Soknann\Reg\CourseController@getDatatable'
));


Route::get('test', function () {
    return Hash::make('123456');

});