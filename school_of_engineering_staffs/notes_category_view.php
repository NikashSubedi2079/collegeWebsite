<?php
// This script and data application were generated by AppGini 22.14
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/notes_category.php');
	include_once(__DIR__ . '/notes_category_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('notes_category');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'notes_category';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`notes_category`.`id`" => "id",
		"if(CHAR_LENGTH(`notes_category`.`notes_category`)>40, concat(left(`notes_category`.`notes_category`,40),' ...'), `notes_category`.`notes_category`)" => "notes_category",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`notes_category`.`id`',
		2 => 2,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`notes_category`.`id`" => "id",
		"`notes_category`.`notes_category`" => "notes_category",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`notes_category`.`id`" => "ID",
		"`notes_category`.`notes_category`" => "Notes category",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`notes_category`.`id`" => "id",
		"`notes_category`.`notes_category`" => "Notes category",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`notes_category` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = (getLoggedAdmin() !== false);
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = (getLoggedAdmin() !== false);
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 20;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'notes_category_view.php';
	$x->TableTitle = 'Notes category';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`notes_category`.`id`';

	$x->ColWidth = [150, ];
	$x->ColCaption = ['Notes category', ];
	$x->ColFieldName = ['notes_category', ];
	$x->ColNumber  = [2, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/notes_category_templateTV.html';
	$x->SelectedTemplate = 'templates/notes_category_templateTVS.html';
	$x->TemplateDV = 'templates/notes_category_templateDV.html';
	$x->TemplateDVP = 'templates/notes_category_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: notes_category_init
	$render = true;
	if(function_exists('notes_category_init')) {
		$args = [];
		$render = notes_category_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: notes_category_header
	$headerCode = '';
	if(function_exists('notes_category_header')) {
		$args = [];
		$headerCode = notes_category_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: notes_category_footer
	$footerCode = '';
	if(function_exists('notes_category_footer')) {
		$args = [];
		$footerCode = notes_category_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}