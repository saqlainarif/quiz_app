<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Jhon',
            'email' => 'jhon@example.com'
        ]);

        Question::create([
                'question_text' => 'PHP stands for?',
                'correct_answer' => 'option_1',
                'option_1' => 'Hypertext Preprocessor',
                'option_2' => 'Pretext Hypertext Preprocessor',
                'option_3' => 'Personal Home Processor',
                'option_4' => 'None of the above'
            ]
        );
        Question::create([
                'question_text' => 'Who is known as the father of PHP?',
                'correct_answer' => 'option_3',
                'option_1' => 'Drek Kolkevi',
                'option_2' => 'List Barely',
                'option_3' => 'Rasmus Lerdrof',
                'option_4' => 'None of the above'
            ]
        );
        Question::create([
                'question_text' => 'Which of the following is the default file extension of PHP?',
                'correct_answer' => 'option_1',
                'option_1' => '.php',
                'option_2' => '.hphp',
                'option_3' => '.xml',
                'option_4' => '.json'
            ]
        );
        Question::create([
                'question_text' => 'Which of the following is used to display the output in PHP?',
                'correct_answer' => 'option_4',
                'option_1' => 'echo',
                'option_2' => 'write',
                'option_3' => 'print',
                'option_4' => 'Both (a) and (c)'
            ]
        );
        Question::create([
                'question_text' => 'Which of the following is used for concatenation in PHP?',
                'correct_answer' => 'option_3',
                'option_1' => '+ (plus)',
                'option_2' => '* (Asterisk)',
                'option_3' => '. (dot)',
                'option_4' => 'append()'
            ]
        );
        //ajax
        Question::create([
                'question_text' => 'Ajax is used for creating?',
                'correct_answer' => 'option_1',
                'option_1' => 'Web applications',
                'option_2' => 'Desktop applications',
                'option_3' => 'System applications',
                'option_4' => 'Both A. and B.'
            ]
        );
        Question::create([
                'question_text' => ' Ajax stands for?',
                'correct_answer' => 'option_1',
                'option_1' => 'Asynchronous JavaScript and XML',
                'option_2' => 'Asynchronous JSON and XML',
                'option_3' => 'Asynchronous Java and XML',
                'option_4' => 'Asynchronous JavaScript and XMLHttpRequest'
            ]
        );
        Question::create([
                'question_text' => 'What server support Ajax?',
                'correct_answer' => 'option_3',
                'option_1' => 'WWW',
                'option_2' => 'SMTP',
                'option_3' => 'HTTP',
                'option_4' => 'All of the above'

            ]
        );
        Question::create([
                'question_text' => ' Ajax sends data to a web server?',
                'correct_answer' => 'option_1',
                'option_1' => 'in the background',
                'option_2' => 'before loading the page',
                'option_3' => 'with reloading the page',
                'option_4' => 'All of the above'
            ]
        );
        Question::create([
                'question_text' => 'How many types of triggers are present in update panel?',
                'correct_answer' => 'option_2',
                'option_1' => 'one',
                'option_2' => 'two',
                'option_3' => 'three',
                'option_4' => 'four'
            ]
        );
        //jquery
        Question::create([
                'question_text' => 'Which of the following sign is used as a shortcut for jQuery?',
                'correct_answer' => 'option_3',
                'option_1' => 'the % sign',
                'option_2' => 'the & sign',
                'option_3' => 'the $ sign',
                'option_4' => 'the @ sign'
            ]
        );
        Question::create([
                'question_text' => '$(this) in jQuery is used when ?',
                'correct_answer' => 'option_2',
                'option_1' => 'an HTML element references the entire document',
                'option_2' => 'an HTML element references its own action',
                'option_3' => 'an HTML element references the action of its parent element',
                'option_4' => 'All of the above'
            ]
        );
        Question::create([
                'question_text' => 'Which of the following jQuery method is used to hide the selected elements?',
                'correct_answer' => 'option_2',
                'option_1' => 'The hidden() method',
                'option_2' => 'The hide() method',
                'option_3' => 'The visible(false) method',
                'option_4' => 'The display(none) method'
            ]
        );
        Question::create([
                'question_text' => 'Which of the following jQuery method can be used to deal with the name conflicts?',
                'correct_answer' => 'option_3',
                'option_1' => 'The conflict() method',
                'option_2' => 'The nameConflict() method',
                'option_3' => 'The noConflict() method',
                'option_4' => 'None of the above'
            ]
        );
        Question::create([
                'question_text' => 'Which of the following jQuery method is used to attach a handler to an event?',
                'correct_answer' => 'option_3',
                'option_1' => 'unbind() method',
                'option_2' => 'attach() method',
                'option_3' => 'bind() method',
                'option_4' => 'None of the above'
            ]
        );
        //html
        Question::create([
                'question_text' => 'The correct sequence of HTML tags for starting a webpage is ?',
                'correct_answer' => 'option_4',
                'option_1' => 'Head, Title, HTML, body',
                'option_2' => 'HTML, Body, Title, Head',
                'option_3' => 'HTML, Head, Title, Body',
                'option_4' => 'HTML, Head, Title, Body'
            ]
        );
        Question::create([
                'question_text' => 'Which of the following element is responsible for making the text bold in HTML?',
                'correct_answer' => 'option_3',
                'option_1' => '<pre>',
                'option_2' => '<a>',
                'option_3' => '<b>',
                'option_4' => '<br>'
            ]
        );
        Question::create([
                'question_text' => 'How to create a hyperlink in HTML?',
                'correct_answer' => 'option_1',
                'option_1' => '<a href = "www.javatpoint.com"> javaTpoint.com </a>',
                'option_2' => '<a url = "www.javatpoint.com" javaTpoint.com /a>',
                'option_3' => '<a link = "www.javatpoint.com"> javaTpoint.com </a>',
                'option_4' => '<a> www.javatpoint.com <javaTpoint.com /a>'
            ]
        );
        Question::create([
                'question_text' => 'How to create a checkbox in HTML?',
                'correct_answer' => 'option_1',
                'option_1' => '<input type = "checkbox">',
                'option_2' => '<input type = "button">',
                'option_3' => '<checkbox>',
                'option_4' => '<input type = "check">'
            ]
        );
        Question::create([
                'question_text' => 'Which of the following HTML tag is used to display the text with scrolling effect?',
                'correct_answer' => 'option_1',
                'option_1' => '<marquee>',
                'option_2' => '<scroll>',
                'option_3' => '<div>',
                'option_4' => 'None of the above'
            ]
        );

    }
}
