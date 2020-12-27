<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Batches;
use App\Models\Student;
use App\Models\Session;

use Illuminate\Http\Request;
use Flash;
use Response;

class StudentController extends AppBaseController
{
    /**
     * Display a listing of the Student.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Student $students */
        $students = Student::all();


        return view('students.index')
            ->with('students', $students);
    }

    /**
     * Show the form for creating a new Student.
     *
     * @return Response
     */
    public function create()
    {
        $session = Session::orderBy('id', 'desc')->first();
        $grades = $session->grades;
        // dd($grades);
        return view('students.create', compact('grades'));
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param CreateStudentRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();
        // dd($request->grade);
        /** @var Student $student */
        $student = Student::create($input);
        $session = Session::orderBy('id', 'desc')->first();
        // $session = Session::all()->last();
        $batch = Batches::where('session_id', $session->id)->where('grade_id', $request->grade)->first();
        // dd($student->id);
        $student->batches()->attach($batch);

        Flash::success('Student saved successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Display the specified Student.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Student $student */
        $student = Student::find($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified Student.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $session = Session::orderBy('id', 'desc')->first();
        $grades = $session->grades;
        /** @var Student $student */
        $student = Student::find($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        return view('students.edit', compact('student', 'grades'));
    }

    /**
     * Update the specified Student in storage.
     *
     * @param int $id
     * @param UpdateStudentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentRequest $request)
    {
        /** @var Student $student */
        $student = Student::find($id);


        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        $student->fill($request->all());
        $student->save();

        Flash::success('Student updated successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified Student from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Student $student */
        $student = Student::find($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        $student->delete();

        Flash::success('Student deleted successfully.');

        return redirect(route('students.index'));
    }
}
