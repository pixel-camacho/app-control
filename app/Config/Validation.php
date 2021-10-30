<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		\App\Validation\UserRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
    
   //RULES USERS
	public $signin = [
		'username' => [
			'rules' => 'required|validateUser[username,password]',
			'errors' => [
				'validateUser' => 'Usuario o password incorrecto'
			]
		],
		'password' => 'required'
	];

	public $signup = [
		'username' => 'required|min_length[4]|max_length[25]|is_unique[users.username]',
		'name' => 'required|min_length[3]|max_length[30]',
		'password' => 'required|min_length[8]|max_length[50]',
		'passwordConfirm' => 'matches[password]'
	];

	//


	//RULES MULTIFUNCIONALES
    
		public $updateMultifuncional = [
		'marca' => 'required',
		'modelo' => 'required',
		'cantidad' => 'required|integer',
		'serie' => 'required|string|max_length[8]',
	    ];

	//

	//RULES REFACCIONES

    public  $refaccion = [
		'pieza' => 'required|alpha_numeric_space',
		'cantidad' => 'required|integer|min_length[1]|max_length[2]',

		'multifuncional_id' => [
			'rules' => 'required|numeric|pieza_multifuncional_exit[multifuncional_id,pieza]',
			'errors' => [
				'pieza_multifuncional_exit' => 'Estimado usuario, este modelo ya tiene esta pieza'
			]
		]
	];


	//


	/*public  $refaccion = [
		'pieza' => 'required',
		'cantidad' => 'required|integer',
		'idMultifuncional' => 'required|integer'
	];*/

	public $tonner = [
		'desccripcion' => 'required',
		'cantidad' => 'required|integer|max_length|min_length',
		'idMultifuncional' => 'required|integer'
	];


} 
