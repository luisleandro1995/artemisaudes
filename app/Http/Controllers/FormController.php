<?php

namespace App\Http\Controllers;


use App\Http\Requests\FormsRequest;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User; 
use App\Models\Dependency; 
use App\Models\WorkSpace; 
use App\Models\Form;
use App\Models\Question;
use App\Models\Answer;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        try
        {
            $userAuth= Auth::user();
            if($userAuth->user_type->level =='admin' || $userAuth->user_type->level =='encuestado')
            {
            $forms = Form::orderBy('id','desc')->paginate(5);
            return view('admin/forms/index', ['forms' =>$forms]) ;
            }
            else {
                $forms = Form::where('user_id',$userAuth->id)->orderBy('id','desc')->paginate(5);
                return view('admin/forms/index', ['forms' =>$forms]) ;
            }
        }
      
        catch(\Exception $e)
        {
            return view ('error');
            

        }
    }

    public function create()
    {
        try
        {
            $user = User::orderBy('id')->get();
            $dependencies = Dependency::orderBy('id')->get();
            $wss = WorkSpace::orderBy('id')->get();

            return view('admin/forms/create', ['users' => $user,
                                               'dependencies' => $dependencies,
                                               'wss' => $wss,

        ]);
        }
        catch(\Exception $e)
        {
            return view ('error');
            

        }
    }

        
    public function store(FormsRequest $request)
    {
        try
        {
           $form = new Form($request->all());
           $form->state = "activo";
           $form->habeas_data=0;
           $form->save();

           return redirect()->route('forms.index');
        }
        catch(\Exception $e)
        {
            return view ('error');
            

        }
    }

    public function show($form)
    {
        try
        {
           $vform = Form::find($form);
               $user = User::orderBy('id')->get();
               $dependencies = Dependency::orderBy('id')->get();
               $wss = WorkSpace::orderBy('id')->get();
               $questions = Question::where('form_id', $vform->id)->paginate(5);
                
            if($vform)
            {
                return view('admin/forms/view', ['form' => $vform,
                    'users' => $user,
                'dependencies' => $dependencies,
                'wss' => $wss,
                'questions' => $questions
            ]);

            }
            else
            {
                return view ('admin/forms/index');
            }
        }
        catch(\Exception $e)
        {
            return view ('error');
            

        }
    }

    public function edit($form)
    {
        try
        {
           $vform = Form::find($form);

           $user = User::orderBy('id')->get();
           $dependencies = Dependency::orderBy('id')->get();
           $wss = WorkSpace::orderBy('id')->get();
          

        if($vform)
        {
            return view('admin/forms/update', ['form' => $vform,
                                             'users' => $user,
                                             'dependencies' => $dependencies,
                                             'wss' => $wss
                                             ]);
 
        }
        else
        {
            return view ('admin/forms/index');
        }
        }
        catch(\Exception $e)
        {
            return view ('error');
            

        }
    }

    public function update(FormsRequest $request, $form)
    {
        try
        {
           $vform = Form::find($form);
           $vform->fill($request->all());
           $vform->save();

            return redirect()->route('forms.index');


        }
        catch(\Exception $e)
        {
            return view ('error');
            

        }
    }

    public function destroy($form)
    {
         try
        {
           $vform = Form::find($form);

           $vform->delete();
            
            return redirect()->route('forms.index');



        }
        catch(\Exception $e)
        {
            var_dump($e);
            die();
            return view ('error');
            

        }
    }

     

    public function questions($form)
    {
        try
        {
            $vform = Form::find($form);

            return view('admin/forms/questions', ['form' => $vform,

        ]);
        }
        catch(\Exception $e)
        {
            return view ('error');
            

        }
    }

           
    public function questionstore(QuestionRequest $request)
    {
        try
        {
           $data = $request->all();

           $formId= $data['id'];

           $titulosArray = [];

           if(array_key_exists ('titulo',$data))

           {

            $titulosArray = $data['titulo'];

           }

                 
           for ($i= 0; $i < count ($titulosArray); $i++)
           {
            $question = new Question();
            $question -> text_box = $titulosArray[$i];
            $question -> field_type = 'title';
            $question -> form_id = $formId;
            $question->save();
           }
        

           $questionsArray = [];
           $fieldsArray = [];

           if(array_key_exists ('que', $data) && array_key_exists('quer', $data))

           {
            $questionsArray = $data['que'];
            $fieldsArray = $data['quer'];
           }

           $habeasArray = [];

           if(isset($data['habeas']))
            $habeasArray= $data['habeas'];


           $checkQuestion = "";
           $checkboxData= "";

           //aqui ijprime data de esto de checkboxesdta

           if(array_key_exists ('checkboxQuestion', $data) && array_key_exists('checkboxes', $data))
           {
                $checkQuestion = $data['checkboxQuestion'];
                $checkboxData = $data['checkboxes'];
           }
           
           for ($i= 0; $i < count ($questionsArray); $i++)
           {
            $question = new Question();
            $question -> text_box = $questionsArray[$i];
            $question -> field_type = $fieldsArray [$i];
            $question -> form_id = $formId;
            $question->save();
           }

           if(count($habeasArray) > 0)
           {
           $form = Form::find($formId);
           $form->habeas_data=1;
           $form->save();
           }

           if ($checkQuestion != "")
           {
               $question = new Question();
               $question->text_box = $checkQuestion;
               $question->field_type = 'checkbox';
               $question->form_id = $formId;

               $options = "";

               for ($i = 0; $i < count ($checkboxData); $i++)
               {
                $options .= $checkboxData[$i];

                if($i + 1 < count($checkboxData))
                    $options .= ";";
               }

               $question ->checkboxes = $options;
               // Save the question
               $question->save();
           }
           

           //agregar datos colmuna y concatenar., 

           return redirect() -> route('forms.index');


           return redirect()->route('forms.index');
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            die();
            //return view ('error');
            

        }
    }

    
    public function response($form)
    {
        try
        {
            $vform = Form::find($form);
            $questions = Question::where('form_id', $form)->get();

            return view('admin/forms/response', ['form' => $vform,
                                                'questions' => $questions,

        ]);
        }
        catch(\Exception $e)
        {
            return view ('error');
            

        }

     
    }

    public function respstore(QuestionRequest $request)
    {
           try

           {

            $data = $request->all();

            $formId= $data['id'];
            $answersArray = $data['quer'];
            $optionsArray = []; 

            for($i = 0; $i < count($answersArray); $i++)
            {
                $answer = new Answer();
                $answer->text = $answersArray[$i];
                $answer->form_id = $formId;
                $answer->save();

            }

                if(isset($data['opc']))
                {
                    $optionsArray = $data['opc'];

                    $answer= new Answer();
                    $resp = "";

                    for($i = 0; $i < count($optionsArray); $i++)
                    {
                        $resp .= $optionsArray[$i];

                        if(( $i +1  ) < count ($optionsArray))
                            $resp .= ";";
                    }

                    $answer->text= $resp;
                    $answer->form_id=$formId;
                    $answer->save();
                }

                return redirect()->route('forms.index');
                
           }
           
           
           catch(\Exception $e)
           {
               return view ('error');
               
   
           }
    
    }

    public function viewexport ()
    {
        try
        {
            $userAuth= Auth::user();
            if($userAuth->user_type->level =='admin' || $userAuth->user_type->level =='encuestado')
            {
            $forms = Form::orderBy('id','desc')->paginate(5);
            return view('admin/forms/viewexport', ['forms' =>$forms]) ;
            }
            else {
                $forms = Form::where('user_id',$userAuth->id)->orderBy('id','desc')->paginate(5);
                return view('admin/forms/viewexport', ['forms' =>$forms]) ;
            }
        }
      
        catch(\Exception $e)
        {
            return view ('error');
            

        }
    }

    

    public function export ($form)
    {
        $vform= Form::find($form);
        $questions = Question::where('form_id', $form) ->get();
        $answers = Answer::where('form_id', $form)->get();

        $array=['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
            'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 
            'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 
            'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 
            'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 
            'AT', 'AU', 'AV', 'AW', 'AY'];


// Crear una nueva hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Encabezados de las columnas
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Publication date');
$sheet->setCellValue('D1', 'End date');
$sheet->setCellValue('E1', 'State');
$sheet->setCellValue('F1', 'Habeas data');



    $sheet->setCellValue('A2', $vform->id);
    $sheet->setCellValue('B2', $vform->name);
    $sheet->setCellValue('C2', $vform->publication_date);
    $sheet->setCellValue('D2', $vform->end_date);
    $sheet->setCellValue('E2', $vform->state);

    if($vform->habeas_data == 1)
        $sheet->setCellValue('F2', 'true');
    else
        $sheet->setCellValue('F2', 'false');


    


    if (count($questions) > 0) 
    {
    
        $fila = 4; 
        
        //Encabezado de las columnas 
        for($i = 0; $i < count($questions); $i++)
            $sheet->setCellValue($array[$i] . $fila, $questions[$i]->text_box);
        
    }

    
    if (count($answers) > 0) 
    {
    
        $fila = 5; 

        //Encabezado de las columnas 
        for($i = 0; $i < count($answers); $i++)
            $sheet->setCellValue($array[$i] . $fila, $answers[$i]->text);
        
    }



// Escribir el archivo en formato Excel
$writer = new Xlsx($spreadsheet);
$nombreArchivo = 'preguntas_formulario.xlsx';
$writer->save($nombreArchivo);

// Descargar el archivo automáticamente
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
$writer->save('php://output');
exit;

return redirect() -> route('forms.index');

    }
    

}

