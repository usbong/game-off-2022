<!--
' Copyright 2020~2022 SYSON, MICHAEL B.
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @company: USBONG
' @author: SYSON, MICHAEL B.
' @date created: 20200306
' @date updated: 20221121; from 20221120
'
' Note: re-used computer instructions mainly from the following:
'	1) Usbong Knowledge Management System (KMS);
'	2) Usbong Flash;
'
' Reference:
' 1) http://gcctech.org/csc/javascript/javascript_keycodes.htm;
' last accessed: 20221101
'
' 2) https://www.w3schools.com/css/css3_2dtransforms.asp;
' last accessed: 20221104
'
' 3) https://www.w3schools.com/css/css_align.asp; 
' last accessed: 20221105 
'
<?php

//TO-DO: -delete: excess instructions

//added by Mike, 20221106
//TO-DO: -remove: keyhold in PUZZLE due to OUTPUT ERROR in SAFARI

//added by Mike, 20221106
//TO-DO: -add: auto-generate PUZZLE
//reminder: FROM END to START

//notes: Metal Walker (GBC);
//keyphrase: Bulalakaw Wars, angle, trigonometry, 
//adds: however, variation in DIRECTION and ACTION COMMANDS
//remembers: Monster Strike, albeit ROBOTS, PARTS

//notes: another OUTPUT
//--> where: no swipe command, one button input only, no key hold
//example: sliding puzzle game


defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">

    <!-- Reference: Apache Friends Dashboard index.html -->
    <!-- "Always force latest IE rendering engine or request Chrome Frame" -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes" />
	
    <style type="text/css">
	/**/
	                    html, body
                        {
                            font-family: Arial;
							font-size: 11pt;
								
							/* edited by Mike, 20220911
							width: 640px; 
							*/
							width: 100%; /*90%; 80%;*/
							height: 100%;
														
							padding: 0;
							margin: 0;
							
							/* //added by Mike, 20221002
							//reference: https://www.w3schools.com/howto/howto_css_disable_text_selection.asp;
							//last accessed: 20221002
							*/
							
						    -webkit-user-select: none; /* Safari */
						    -ms-user-select: none; /* IE 10 and IE 11 */
						    user-select: none; /* Standard syntax */
							
							/* added by Mike, 20221012 */
							transform: scale(1.0);
							
							/* added by Mike, 20221119 */							
							touch-action: none;
						}
						
						/* added by Mike, 20220911 */
	                    body.bodyPortraitMode
                        {
                            font-family: Arial;
							font-size: 11pt;
							width: 100%; /*80%;*/
							height: 100%;
							padding: 0;
							margin: auto;
						}						

	                    body.bodyLandscapeMode
                        {
                            font-family: Arial;
							font-size: 11pt;
							width: 100%; /*80%;*/
							height: 100%; /*80%;*/
							padding: 0;
							margin: auto;
						}						
						
						canvas.myCanvas {
							
							/*width: 100%;*/ /*80%;*/ /*160px; */
							/*height: 100%;*/ /*80%;*/ /*144px;*/ 
							
							/*reference: https://stackoverflow.com/questions/5127937/how-to-center-canvas-in-html5; last accessed: 20220911
							answer by: Marco Luglio, 20111016T0357
							*/
							
							padding: 0;
							margin: auto;							
							display: block;
							
							width: 320px;
							height: 288px;	

/*
							transform: scale(1.0,0.9);	
*/							
							
							/* //added by Mike, 20221104 */
							z-index: -1;							
						}
						
						audio.myAudio
						{
							width: 416px;
							height: 312px;
						}
						
						a.executeLink
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 12px;
							background-color: #ffe400;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 4px;		

							visibility: visible;							
						}

						a.pauseLink
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 2px;
							margin: 2px;
/*	//gold
							background-color: #ffe400;
							color: #222222;
*/
							background-color: rgb(60,60,60);
							color: rgb(60,60,60);

							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 4px;		

							visibility: hidden; /*visible;*/							
						}

						a.pauseLink:active
						{
							background-color: rgb(20,20,20);
							color: rgb(20,20,20);						
						}
						/* //added by Mike, 20221113 */
						button:focus
						{
							outline:0;
						}
						
						/* //added by Mike, 20220917
						//reference: GAMEBOY COLOR;
						//US PATENT NO.5.095.798
						//to still exist?
						//PHILIPPINE PATENT?
						//
						//remembers: NOKIA mobile telephone (J2ME);
						//where: ACTION button @CENTER of DIRECTIONAL KEY;
						*/
						button.controlKeyButtonLeft, .controlKeyButtonRight, .controlKeyButtonUp, .controlKeyButtonDown, .controlKeyButtonLeverCenterNeutral
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 10px; /*12px;*/
							background-color: rgb(60,60,60);							
							color: rgb(60,60,60); /*rgb(30,30,30);*/

							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px; /*4px*/
							
							margin: 0px;
							
							visibility: hidden;
							
							z-index: 99;
						}

						button:active { /* focus out after click */
/*	//bright
							background-color: rgb(120,120,120);
							color: rgb(120,120,120); 
*/
							background-color: rgb(20,20,20);
							color: rgb(20,20,20); 
						}
						
						/*
							TO-DO: -reverify: this;
							//remembers: XBOX 360 controller;
							//keyphrase: LED (Light Emitting Diode)
						*/
						
						button.controlKeyButtonLetterJ
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 8px;
							/*
							  background-color: rgb(123,196,45);							
							  color: rgb(123,196,45);
							*/
							background-color: rgb(107,169,39);
							color: rgb(107,169,39); 
							
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 90px; /*4px*/
							
							margin: 0px;
							
							visibility: hidden;
							
							z-index: 99;							
						}
						
						button.controlKeyButtonLetterJ:active { /* focus out after click */
							background-color: rgb(75,119,28);
							color: rgb(75,119,28); 
						}						
						
						button.controlKeyButtonLetterL
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 8px;
							background-color: rgb(183,0,0);							
							color: rgb(183,0,0);

							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 90px; /*4px*/
							
							margin: 0px;
							
							visibility: hidden;
							
							z-index: 99;							
						}
						
						button.controlKeyButtonLetterL:active { 
							background-color: rgb(132,0,0);
							color: rgb(132,0,0); 
						}	
						
						button.controlKeyButtonLetterI
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 8px;
							background-color: rgb(237,203,10);							
							color: rgb(237,203,10);

							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 90px; /*4px*/
							
							margin: 0px;
							
							visibility: hidden;

							z-index: 99;							
						}
						
						button.controlKeyButtonLetterI:active { 
							background-color: rgb(204,174,9);
							color: rgb(204,174,9); 
						}	
						
						button.controlKeyButtonLetterK
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 8px;
							background-color: rgb(9,46,145);							
							color: rgb(9,46,145);

							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 90px; /*4px*/
							
							margin: 0px;
							
							visibility: hidden;
							
							z-index: 99;							
						}
						
						button.controlKeyButtonLetterK:active { 
							background-color: rgb(7,38,118);
							color: rgb(7,38,118); 
						}	
						
						/* //keyphrase: KEYBOARD */
						button.controlKeyButtonRightLeverCenterNeutral
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 8px;
							background-color: rgb(255,255,255); /*rgb(60,60,60);*/ /*rgb(12,139,79);	*/						
							color: rgb(255,255,255); /*rgb(60,60,60);*/ /*rgb(12,139,79);*/

							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 90px; /*4px*/
							
							margin: 0px;
							
							visibility: hidden;
							
							z-index: 99;							
						}
						
						button.controlKeyButtonRightLeverCenterNeutral:active { 
							background-color: rgb(255,255,255); /*rgb(20,20,20);*/ /*rgb(9,100,56);*/
							color: rgb(255,255,255); /*rgb(20,20,20);*/ /*rgb(9,100,56);*/ 
						}	

						div.checkBox
						{
								border: 1.5pt solid black; height: 9pt; width: 9pt;
								text-align: center;
								float: left
						}
						
						div.option
						{
								padding: 2pt;
								display: inline-block;
						}
						
						div.copyright
						{
								text-align: center;
						}
						
						div.patientName
						{
							text-align: left;
						}						

						div.medicalDoctorName
						{
							text-align: left;
						}						
						
						div.tableHeader
						{
							font-weight: bold;
							text-align: center;
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;
						}					

						div.tableHeaderAddNewPatient
						{
							font-weight: bold;
							text-align: center;
							background-color: #ff8000; <!--#93d151; lime green-->
							border: 1pt solid #ff8000;
						}						
						
						input.browse-input
						{
							width: 100%;
							max-width: 500px;
														
							resize: none;

							height: 100%;
						}	
									
						img {
							visibility: hidden;
						}

						img.Image-companyLogo {
							max-width: 60%;
							height: auto;
							float: left;
							text-align: center;
							padding-left: 20px;
							padding-top: 10px;
						}

						img.Image-moscLogo {
							max-width: 20%;
							height: auto;
							float: left;
							text-align: center;
						}						
						
						table.addPatientTable
						{
							border: 2px dotted #ab9c7d;		
							margin-top: 10px;
						}						
						
						
						table.search-result
						{
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table
						{
							border-collapse: collapse;
							 
							padding: 0;		
							margin: 0;

							/*added by: Mike, 20220830 */
							overflow: hidden;
							
							/*added by: Mike, 20220902; 
							  note: effect */							
							/*border: 1px dotted #ab9c7d;*/							
							
							/*added by Mike, 20220902;
							  still INCORRECT OUTPUT;
							display: block;
							max-width:640px;							
							*/
						}
						

						tr
						{
							padding: 0;		
							margin: 0;
						}						

						td 
						{
							padding: 0;		
							margin: 0;
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: right							
						}						
						
						td.imageColumn
						{
							width: 40%;
							display: inline-block;
						}				

						td.pageNameColumn
						{
							width: 50%;
							display: inline-block;
							text-align: right;
						}
						
						.Button-emptyStonePosCornerTopLeftPillar {
							padding: 10px;

							/*added by: Mike, 20220830 */
							overflow: hidden;								
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

/*	//removed by Mike, 20220830

							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;

							/* note: negative VALUE for opposite side */

							box-shadow:inset 2px 2px 0 0px black;		
						}

						.Button-emptyStonePosCornerTopLeftPillar:hover {
							background-color: #b80000;
							border-radius: 45px;
							box-shadow:inset 0px 0px 0 0px black;														
						}

						.Button-emptyStonePosCornerTopLeftPillar:focus {
							background-color: #b80000;
							box-shadow:inset 0px 0px 0 0px black;														
						}
						
						.Button-emptyStonePosCornerTopLeft {
							padding: 10px;

/* //added by Mike, 20220830
   //reference: https://stackoverflow.com/questions/3795888/extra-padding-on-chrome-safari-webkit-any-ideas;
   //last accessed: 20220830
   //"This has to do with the way margins collapse together so that two margins between elements don't accumulate."
   //answer by: Andrew Vit, 20100926T0001
*/
							overflow: hidden;	
							
							background-color: #ff9300;

/*	//removed by Mike, 20220830
							color: #222222;
*/

							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

/*	//removed by Mike, 20220830
							float: left;
*/
							margin: 0px;
						}

						.Button-emptyStonePosCornerTopLeft:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerTopLeft:focus {
							background-color: #b80000;
						}

/*
	TOP-RIGHT CORNER
*/
						.Button-emptyStonePosCornerTopRightPillar {
							padding: 10px;
							
							/*added by: Mike, 20220830 */
							overflow: hidden;	
														
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							
							/* added by Mike, 20220830 */
							margin: 0px;
							
						
							/* note: negative VALUE for opposite side */
							box-shadow:inset -2px 2px 0 0px black;														
						}

						.Button-emptyStonePosCornerTopRightPillar:hover {
							background-color: #b80000;
							border-radius: 45px;
							box-shadow:inset 0px 0px 0 0px black;														
						}

						.Button-emptyStonePosCornerTopRightPillar:focus {
							background-color: #b80000;
							box-shadow:inset 0px 0px 0 0px black;														
						}
						
						.Button-emptyStonePosCornerTopRight {
							padding: 10px;

							/*added by: Mike, 20220830 */
							overflow: hidden;								
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
						}

						.Button-emptyStonePosCornerTopRight:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerTopRight:focus {
							background-color: #b80000;
						}
						

/*
	BOTTOM-LEFT CORNER
*/
						.Button-emptyStonePosCornerBottomLeftPillar {
							padding: 10px;
							
							/*added by: Mike, 20220830 */
							overflow: hidden;							
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;


							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
							

							/* note: negative VALUE for opposite side */
							box-shadow:inset 2px -2px 0 0px black;														
						}

						.Button-emptyStonePosCornerBottomLeftPillar:hover {
							background-color: #b80000;
							border-radius: 45px;
							box-shadow:inset 0px 0px 0 0px black;														
						}

						.Button-emptyStonePosCornerBottomLeftPillar:focus {
							background-color: #b80000;
							box-shadow:inset 0px 0px 0 0px black;														
						}
						
						.Button-emptyStonePosCornerBottomLeft {
							padding: 10px;

							/*added by: Mike, 20220830 */
							overflow: hidden;								
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
						}

						.Button-emptyStonePosCornerBottomLeft:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerBottomLeft:focus {
							background-color: #b80000;
						}
						
/*
	BOTTOM-RIGHT CORNER
*/
						.Button-emptyStonePosCornerBottomRightPillar {
							padding: 10px;

							/*added by: Mike, 20220830 */
							overflow: hidden;						
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
						
							/* note: negative VALUE for opposite side */
							box-shadow:inset -2px -2px 0 0px black;														
						}

						.Button-emptyStonePosCornerBottomRightPillar:hover {
							background-color: #b80000;
							border-radius: 45px;
							box-shadow:inset 0px 0px 0 0px black;														
						}

						.Button-emptyStonePosCornerBottomRightPillar:focus {
							background-color: #b80000;
							box-shadow:inset 0px 0px 0 0px black;														
						}
						
						.Button-emptyStonePosCornerBottomRight {
							padding: 10px;
							
							/*added by: Mike, 20220830 */
							overflow: hidden;								
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
						}

						.Button-emptyStonePosCornerBottomRight:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerBottomRight:focus {
							background-color: #b80000;
						}

						/* noted by Mike, 20221104 */
						.ImageBackgroundOfPuzzle {
							position: absolute;

							text-align: center;
							line-height: 32px;							

  							/*clip: rect(0px,64px,64px,0px);*/
																								visibility: hidden;
							
							/*
							transform: scale(0.5);						*/	
							transform: scale(0.5,0.8);	

							/* //added by Mike, 20221104 */
							z-index: 0;		
							
						}

						.ImageBackgroundOfAction {
							position: absolute;

							text-align: center;
							line-height: 32px;							
																								visibility: hidden;
							
							/*transform: scale(0.5,0.8);	
							*/
														
							padding: 0;
							margin: auto;
							display: block;							
														
							width: 320px;
							height: 288px;

							/* //added by Mike, 20221104 */
							z-index: 0;		
							
						}


						/* noted by Mike, 20221105 */						
						.Image32x32Tile {
							position: absolute;
	
							/* //added by Mike, 20221113 */
						    width: 128px;
						    height: 128px;
							object-fit: contain;
	
							/* //added by Mike, 20221112 */
  							clip: rect(0px,32px,32px,0px);
	
							background-color: transparent;
							border: none;

							color: #222222;

							/* //removed by Mike, 20221111
							opacity: 0.5;*/
							
							font-weight: bold;
							font-size: 146%; /*20px;*/
							
							text-align: center;							
							line-height: 32px;

							/*padding-top: 0.1875%;*/ /*6px;*/

/* //removed by Mike, 20221112							
							border: 2px solid; 
							border-radius: 3px;
*/

							visibility: hidden;

							margin: 0px; /*1px;*/	
							padding: 0px;
							z-index: 3;		
							
						}

						/* noted by Mike, 20221105 */						
						.Image32x32TileTarget {
							position: absolute;

							/* //added by Mike, 20221113 */
						    width: 128px;
						    height: 128px;
							object-fit: contain;


							/* //added by Mike, 20221112 */
  							clip: rect(0px,32px,32px,0px);
	
/* //removed by Mike, 20221112
							width: 32px;
							height: 32px;
*/

/* //edited by Mike, 20221112 */
/*
							background-color: #ffffff;
*/
background-color: transparent;
border: none;
							color: #222222;

							/* //added by Mike, 20221111 
							   //TO-DO: -update: this
							*/
							opacity: 0.5;

							font-weight: bold;
							font-size: 146%; /*18px;*/

							text-align: center;							
							line-height: 32px;

							/*padding-top: 0.1875%;*/ /*6px;*/

/* //note: with clip rect border is put on entire sprite image */
/* //removed by Mike, 20221112
							border: 3px solid #ff0000;
							border-radius: 3px;
*/
							margin: 0px; /*1px;*/	
							padding: 0px;
							z-index: 4;		
						}
						
						.Image32x32TileTargetBorder {
							position: absolute;

							width: 27px;
							height: 27px;

							background-color: transparent;
							color: #222222;

							font-weight: bold;
							font-size: 146%; /*18px;*/

							text-align: center;							
							line-height: 32px;

							border: 3px solid #ff0000;
							border-radius: 3px;

							visibility: hidden;

							margin: 0px;
							padding: 0px;
							z-index: 4;		
						}
						
						
						.Image32x32TileSpaceTargetPrev {
							position: absolute;

							/* //added by Mike, 20221113 */
						    width: 128px;
						    height: 128px;
							object-fit: contain;


							/* //added by Mike, 20221112 */
  							clip: rect(0px,32px,32px,0px);
	
/* //removed by Mike, 20221112
							width: 32px;
							height: 32px;
*/

/* //edited by Mike, 20221112 */
/*
							background-color: #222222;
*/
background-color: transparent;
border: none;


							color: #222222;

							/* //added by Mike, 20221111 
							   //TO-DO: -update: this
							*/
							opacity: 0.5;
							
							text-align: center;
							line-height: 32px;

							/*padding-top: 0.1875%;*/ /*6px;*/
							
/* //note: with clip rect border is put on entire sprite image */
/* //removed by Mike, 20221112
							border: 3px solid #ff0000;
							border-radius: 3px;
*/
							margin: 0px; /*1px;*/	
							padding: 0px;
							z-index: 5;		
						}
						
						.Image32x32TileSpaceTarget {
							position: absolute;

							width: 27px;
							height: 27px;

							background-color: #000000; /*#ffffff;*/
							color: #222222;

							text-align: center;
							line-height: 32px;
						
							border: 3px solid #ffffff; /*#ff0000;*/
							border-radius: 3px;

							margin: 0px;
							padding: 0px;
							z-index: 5;		
						}						
						
						/* added by Mike, 20221105 */
						.Image32x32TileSpace {
							position: absolute;
							
							/* //added by Mike, 20221113 */
						    width: 128px;
						    height: 128px;
							object-fit: contain;
							
							
							/* //added by Mike, 20221112 */
  							clip: rect(0px,32px,32px,0px);
	
/* //removed by Mike, 20221112
							width: 32px;
							height: 32px;
*/

/* //edited by Mike, 20221112 */
/*
							background-color: #222222;
*/
background-color: transparent;
border: none;
							color: #222222;

							text-align: center;
							line-height: 32px;							

							/*padding-top: 0.1875%;*/ /*6px;*/
							
/* //note: with clip rect border is put on entire sprite image */
/* //removed by Mike, 20221112
							border: 3px solid #ff0000;
							border-radius: 3px;
*/
							margin: 0px; /*1px;*/	
							padding: 0px;	

							z-index: 3;		
						}
												
						
						/* noted by Mike, 20220820
						using: absolute positions; 
						add: auto-identify IF mobile*/
						.Image64x64Tile {
							position: absolute;
  							clip: rect(0px,64px,64px,0px);
							
							/* //added by Mike, 20221104 
								reverified: this
							*/
							z-index: 2;								
						}
						
						.Image64x64TileFrame1 {
							position: absolute;
  							clip: rect(0px,64px,64px,0px);

							/* //added by Mike, 20220904; removed by Mike, 20220904
								TO-DO: -verify: @set vertex, e.g. center */
							/*
								transform: rotate(-15deg);
							*/	

							visibility: hidden;
						}

						.Image64x64TileFrame2 {
							position: absolute;
  							/*clip: rect(0px,128px,64px,64px);*/
  							clip: rect(0px,64px,64px,0px);
							object-position: -64px; /*TO-DO: -add: current position*/
						}
						
						.Image64x64TileBackground {
							position: absolute;
  							clip: rect(0px,64px,64px,0px);					
						}
						
						.Image32x32TileFrame1 {
							position: absolute;
  							clip: rect(0px,32px,32px,0px);
						}

						.Image32x32TileFrame2 {
							position: absolute;
  							/*clip: rect(0px,128px,64px,64px);*/
  							clip: rect(0px,32px,32px,0px);
/* //removed by Mike, 20221116							
							object-position: -32px;
*/							
						}						

						
						/* added by Mike, 20220825 
						reference: https://stackoverflow.com/questions/15533636/playing-sound-in-hidden-tag; last accessed: 20220825
						//answer by: couzzi, 20130320T2013						
						*/
						audio { 
							display:none;
						}
						

    /**/
    </style>
    <title>
      囲碁 STAGE
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  
  <base href="http://store.usbong.ph/"> <!--target="_blank"-->
  
  </head>
	  <script>
	  
//added by Mike, 20220910
//notes:	  
--> verifying: Gameboy Control Scheme as executed on Mobile, e.g. ANDROID
--> "Keep the original GameBoy screen resolution of 160px x 144px."
--> https://itch.io/jam/gbjam-9; last accessed: 20220909	  
	  
	  
//added by Mike, 20220912
//note: landscape screen size in SUPER FANTASY ZONE, DEFENDER ARCADE
//keyphrase: FLYING, PlayStation Portable, Nintendo Switch Lite
//current: gameboy color screen ratio; 160x144, w x h
const iStageMaxWidth=160*2; //160;
const iStageMaxHeight=144*2; //144;

var iHorizontalOffset=0;
var iVerticalOffset=0;

//note: for INNER SCREEN
iHorizontalOffset=(screen.width)/2-iStageMaxWidth/2;

//added by Mike, 20221005
iVerticalOffsetInnerScreen=0;

//added by Mike, 20221119
var iHorizontalOffsetOfTargetBorder=0;

//added by Mike, 20221108
iCurrentAppleWebKitInnerWidth=0;

//added by Mike, 20221118
var sBaseURL = '<?php echo base_url();?>';

//added by Mike, 20221115
var iCurrentMiniGame=0;
const MINI_GAME_PUZZLE=0;
const MINI_GAME_ACTION=1;

//added by Mike, 20221118
var imgPuzzle;


//added by Mike, 20221012; edited by Mike, 2022115
/*
let humanTileX = iStageMaxWidth/2;
let humanTileY = iStageMaxHeight/2;	
*/
let humanTileX = 0;
let humanTileY = 0;	

//added by Mike, 20221120
let iImgMonsterTileWidth=64; //32;
let iImgMonsterTileHeight=64; //32;


//added by Mike, 20220925
//note: for CONTROLLER BUTTONS
iVerticalOffset=(iStageMaxHeight+(screen.height/1.5-iStageMaxHeight));
	  	  
//added by Mike, 20220925
bIsMobile = false;	  

//added by Mike, 20221108
bIsUsingAppleWebKit=false;
//added by Mike, 20221108
iAppleWebKitInnerWidthOffset=0;
//added by Mike, 20221109
bIsUsingAppleMac=false;

//added by Mike, 20221110
bIsAudioPlaying=false;

//added by Mike, 20221105
bIsTargetAtSpace = true;
		  
iTargetAtSpaceBlinkAnimationCount=0;
iTargetAtSpaceBlinkAnimationCountMax=6;
		  
//added by Mike, 20221106
iTargetTileBgCount=-1;		  

//added by Mike, 20221106
//note: 4x4
var iRowCount=0;
const iRowCountMax=4;
var iColumnCount=0;
const iColumnCountMax=4;
var arrayPuzzleTileCountId = []; 
var arrayPuzzleTilePos = [ [],[],[],[] ]; 

const iTileBgCountMax=iRowCountMax*iColumnCountMax;	

//added by Mike, 20221108
var iCountMovementStep=0;
const iCountMovementStepMax=100;
var bIsInitAutoGeneratePuzzleFromEnd=false;
var iDelayAnimationCountMovementStep=0;
const iDelayAnimationCountMovementStepMax=6;

//added by Mike, 20221120
var iNoKeyPressCount=0;
const iNoKeyPressCountMax=100; //10;//0;// 512;

var iMonsterAttackIndex=0;
var iMonsterAttackIndexFromTopToBottom=0;
var iMonsterAttackIndexFromBottomToTop=1;
var iMonsterAttackIndexFromLeftToRight=2;
var iMonsterAttackIndexFromRightToLeft=3;

var bIsMonsterExecutingAttack=false;

//added by Mike, 20221115
var bIsInitMiniGameAction=true;

//added by Mike, 20221108
var bIsToLeftCornerDone=false;
var bIsToTopCornerDone=false;
var bIsToRightCornerDone=false;
var bIsToBottomCornerDone=false;

//added by Mike, 20221114
var bHasPressedStart=false;
		  
//added by Mike, 20220829
const iHumanTileAnimationCountMax=6; //12;//20; //6;
iHumanTileAnimationCount=0;	  

//added by Mike, 20221120
const iMonsterTileAnimationCountMax=3;
iMonsterTileAnimationCount=0;	  

//edited by Mike, 20221120; from 20220915
iMonsterStepY=10;
iMonsterStepX=10;

iMonsterTileY=0;
iMonsterTileX=0;

//added by Mike, 20221029
iTouchStartX=0;
iTouchStartY=0;
iTouchEndX=0;
iTouchEndY=0;

iTouchStartCount=0;
iTouchEndCountMax=5;

//added by Mike, 20221115
var iFacingDirection=0;

const iFACING_DOWN=0;
const iFACING_UP=1;
const iFACING_LEFT=2;
const iFACING_RIGHT=3;

var bIsWalkingAction=false;

	  
//added by Mike, 20220822
//OK; this technique solves noticeable delay when holding the key press;
//can add simultaneous keypresses;
//edited by Mike, 20220823
//bKeyDownRight = false;
const iKEY_W = 0;
const iKEY_S = 1;
const iKEY_A = 2;
const iKEY_D = 3;

const iKEY_I = 4;
const iKEY_K = 5;
const iKEY_J = 6;
const iKEY_L = 7;


const iTotalKeyCount = 8; //4;

//added by Mike, 20221030
const iDirectionTotalKeyCount = 4;
//const iActionTotalKeyCount = 4;


//https://www.w3schools.com/js/js_arrays.asp; last accessed: 20220823
const arrayKeyPressed = [];
for (iCount=0; iCount<iTotalKeyCount; iCount++) {
	arrayKeyPressed[iCount]=false;
}

//added by Mike, 20221118
//reference: https://stackoverflow.com/questions/21246818/how-to-get-the-base-url-in-javascript;
//last accessed: 20221118
//answer by: Muhammad Raheel, 20140121T0707
function getBaseURL(){
    return sBaseURL;
}

//added by Mike, 20221120
function changeMiniGame(iMiniGameId) {
//	alert("HALLO!");
	
	if (iCurrentMiniGame==MINI_GAME_PUZZLE){
		if (iMiniGameId!=MINI_GAME_PUZZLE) {
			removeFromPuzzleStageExcessTiles();
		}
	}

	iCurrentMiniGame=iMiniGameId;

	//added by Mike, 20221120
	bIsInitMiniGameAction=false;
}

function removeFromPuzzleStageExcessTiles() {
	//iTileBgCountMax = 16
	for (let iTileBgCount=0; iTileBgCount<iTileBgCountMax; iTileBgCount++) {		
		arrayPuzzleTileCountId[iTileBgCount] = document.getElementById("puzzleTileImageIdBg"+iTileBgCount);
		
		arrayPuzzleTileCountId[iTileBgCount].style.visibility="hidden";
	}	
	
	//added by Mike, 2022119
	var puzzleTileImageTargetBorder = document.getElementById("divPuzzleTileImageTargetBorderId");
	
	puzzleTileImageTargetBorder.style.visibility="hidden";
}


/*
//added by Mike, 20220825
//reference: https://www.w3schools.com/jsref/met_audio_play.asp;
//last accessed: 20220825
var x = document.getElementById("myAudioId");

function playAudio() {
  x.play();
}

function pauseAudio() {
  x.pause();
} 
*/


//--
	//note: learned: to be doable via Android (Samsung Galaxy S Duos)
	//after observing successful execution of the following:
	//1) https://invertedhat.itch.io/postie; last accessed: 20221031; from 20221031
	//2) https://allalonegamez.itch.io/rewind-time; last accessed: 20220825
	//
	//reference: https://developer.mozilla.org/en-US/docs/Web/API/Fullscreen_API;
	//last accessed: 20220825
	function toggleFullScreen() {		
	  //added by Mike, 20221114	
	  bHasPressedStart=true;
		
	  //added by Mike, 20221108
	  //note: fullscreenElement command 
	  //does NOT execute on AppleWebKit, e.g. iPad 15
	  //added by Mike, 20221110
	  if (!bIsUsingAppleWebKit) {
		  if (!document.fullscreenElement) {
			document.documentElement.requestFullscreen();
			
			document.getElementById("myAudioId").play();
			bIsAudioPlaying=true;

					//alert("hallo");

		  } else if (document.exitFullscreen) {

			//added by Mike, 20221020
			//pauseAudio();
			document.getElementById("myAudioId").pause();

			//added by Mike, 20221110
			bIsAudioPlaying=false;
			
			document.exitFullscreen();
		  }
	  }
	  else {
		  if (!bIsAudioPlaying) {		
//			alert("play");
		  	document.getElementById("myAudioId").play();		  
			bIsAudioPlaying=true;
		  }
		  else {
//			alert("pause");
		    document.getElementById("myAudioId").pause();
		    bIsAudioPlaying=false;
		  }
	  }
	}

	document.addEventListener("keydown", (e) => {
	  if (e.key === "Enter") {
		toggleFullScreen();
	  }
	  
	  //added by Mike, 20221101; removed by Mike, 20221101
/*
	  //note: shall need to override existing pre-written ACTIONS
	  if (e.key === "Escape") {
//		  alert("dito");
		toggleFullScreen();
	  }
*/
	}, false);
//--

//added by Mike, 20221112
//note: execute this due to broken image icon appears using Google Chrome
function autoUpdatePuzzleTileImage() {
	iTileBgCount=0; //0+1;//0;

//removed by Mike, 20221113
	//iCount=0;

/* //edited by Mike, 2022113
	for (iRowCount=0; iRowCount<iRowCountMax; iRowCount++) {
		for (iColumnCount=0; iColumnCount<iColumnCountMax; iColumnCount++) {
*/			
	while (iTileBgCount<16) {
			if (arrayPuzzleTileCountId[iTileBgCount].alt=="") {
			//	alert(iTileTextCount);
					
			//notes: noticeable DELAY to fix OUTPUT error;
			//where: IF SPACE tile (BLINKING) is immediately 
			//to the left of tile with text "15", 
			//the tiles that were exchanged
			//to be located below or right of it
			//are INCORRECTLY displayed as also the SPACE tile,
			//albeit NOT BLINKING 
			//elapsed time: 5hrs (approx);
			//technique to solve: CLARIFY; verify significance
			//example: VALUE : arrayPuzzleTileCountId, iTileBgCount;
			//to get iRowCount and iColumnCount position
			//--> example OUTPUT VALUE: "15"

			//note: Tile Space; target number become its own	
			//clip
			arrayPuzzleTileCountId[iTileBgCount].style.objectPosition = "-96px -96px";
			
				
			}
			else {
			
			//added by Mike, 20221113
			iTileTextCount=parseInt(arrayPuzzleTileCountId[iTileBgCount].alt);
					
				iColumnCount = (iTileTextCount-1)%4;
				iRowCount = Math.floor((iTileTextCount-1)/4);

				//x, y
				arrayPuzzleTileCountId[iTileBgCount].style.objectPosition = "-" + iColumnCount*32 + "px -" + iRowCount*32 + "px";
			}
				
			iTileBgCount++;
	}	
}


//added by Mike, 20221111
function autoVerifyPuzzleIfAtEnd() {
	if (!bIsInitAutoGeneratePuzzleFromEnd) {
		iTileBgCount=0;

		for (iRowCount=0; iRowCount<iRowCountMax; iRowCount++) {
			for (iColumnCount=0; iColumnCount<iColumnCountMax; iColumnCount++) {
				//alert(iTileBgCount);

				if (arrayPuzzleTileCountId[iTileBgCount].alt=="") {
				}				
				else if (arrayPuzzleTileCountId[iTileBgCount].alt!=(iTileBgCount+1)) {
					return;
				}			
				
				iTileBgCount++;
			}
		}
			
		alert("DONE!");
	}	
}

//added by Mike, 20221108
//note: Carnage Heart from Videogame Magazines, Artificial Intelligence 
function autoGeneratePuzzleFromEnd() {
/*
	arrayKeyPressed[iKEY_A]=true;	
	arrayKeyPressed[iKEY_K]=true;
*/

	//added by Mike, 20221108
	//move all outer tiles
	//to: left corner
	if (!bIsToLeftCornerDone) {
		if (iCountMovementStep<iColumnCountMax) {
			arrayKeyPressed[iKEY_A]=true;	
			arrayKeyPressed[iKEY_K]=true;
			iCountMovementStep++;		

			return;
		}
		iCountMovementStep=0;
		bIsToLeftCornerDone=true;
/*		
		//added by Mike, 20221111; removed by Mike, 20221111
		//note: add to quickly verify end OUTPUT
		bIsInitAutoGeneratePuzzleFromEnd=false;
		return;
*/		
	}
	
	if (!bIsToTopCornerDone) {
		//to: top corner	
		if (iCountMovementStep<iRowCountMax) {
			arrayKeyPressed[iKEY_W]=true;	
			arrayKeyPressed[iKEY_K]=true;
			iCountMovementStep++;
			return;
		}
		iCountMovementStep=0;
		bIsToTopCornerDone=true;
	}

	if (!bIsToRightCornerDone) {	
		//to: right corner
		if (iCountMovementStep<iColumnCountMax) {
			arrayKeyPressed[iKEY_D]=true;	
			arrayKeyPressed[iKEY_K]=true;
			iCountMovementStep++;		
			return;
		}
		iCountMovementStep=0;
		bIsToRightCornerDone=true;
	}

	if (!bIsToBottomCornerDone) {	
		//to: bottom corner -1	
		if (iCountMovementStep<iRowCountMax-1) {
			arrayKeyPressed[iKEY_S]=true;	
			arrayKeyPressed[iKEY_K]=true;
			iCountMovementStep++;
			return;
		}
		iCountMovementStep=0;
		bIsToBottomCornerDone=true;
	}
	
	//reference: https://www.w3schools.com/jsref/jsref_random.asp;
	//last accessed: 20221108
	//number between 0 and 4; integer only	
//	for (iCount=0; iCount<iCountMovementStepMax; iCount++) {
	
	if (iCountMovementStep<iCountMovementStepMax) {
		let iDirection = window.parseInt(Math.random() * 4);	
		switch (iDirection) {
			case iKEY_W: //0
				arrayKeyPressed[iKEY_W]=true;	
				arrayKeyPressed[iKEY_K]=true;						
				break;	
			case iKEY_S: //1
				arrayKeyPressed[iKEY_S]=true;	
				arrayKeyPressed[iKEY_K]=true;
				break;	
			case iKEY_A: //2
				arrayKeyPressed[iKEY_A]=true;	
				arrayKeyPressed[iKEY_K]=true;
				break;	
			case iKEY_D: //3
				arrayKeyPressed[iKEY_D]=true;	
				arrayKeyPressed[iKEY_K]=true;			
				break;	
		}
		iCountMovementStep++;
	}	
	else {		
		bIsInitAutoGeneratePuzzleFromEnd=false;
	}
}

// NOTE:
//reference: https://stackoverflow.com/questions/8663246/javascript-timer-loop;
//last accessed: 20220424
//answer by: keyboardP, 20111229T0158
//edited by: Ken Browning, 20111229T0200
//edited by Mike, 20220820
function myUpdateFunction() {

//	iCurrentMiniGame=MINI_GAME_ACTION;

	//added by Mike, 20221115
    switch(iCurrentMiniGame) {
    	case MINI_GAME_PUZZLE:
			miniGamePuzzleUpdate();
    	break;

    	case MINI_GAME_ACTION:
			miniGameActionUpdate();
    	break;
    }
}

function miniGameActionUpdate() {
	var imgUsbongLogo = document.getElementById("usbongLogoId");
	//imgUsbongLogo.style.visibility="hidden";
	
	//added by Mike, 20221118
	imgPuzzle = document.getElementById("puzzleImageId");
/*
	if (imgPuzzle!=null) {		
		//imgPuzzle.style.visibility="hidden";		
		//imgPuzzle.remove();		
		
		imgPuzzle.parentNode.removeChild(imgPuzzle);
	}
*/	
	//added by Mike, 2022118
	imgPuzzle.setAttribute("src", getBaseURL()+"assets/images/bgImageCave.png");
	imgPuzzle.setAttribute("class", "ImageBackgroundOfAction");
	imgPuzzle.style.visibility="visible";		
	
/*	
	//note: directional and action movements executable without yet ENTER
	miniGamePuzzleUpdate();	
	return;
*/

	//added by Mike, 20220820
	var humanTile = document.getElementById("humanTileImageId");

	//added by Mike, 20220904
	var monsterTile = document.getElementById("monsterTileImageId");
	
	//added by Mike, 20220917; edited by Mike, 20220918
	//var linkAsButtonLeftKey = document.getElementById("leftKeyId");
	var buttonLeftKey = document.getElementById("leftKeyId");
	var buttonRightKey = document.getElementById("rightKeyId");
	var buttonUpKey = document.getElementById("upKeyId");
	var buttonDownKey = document.getElementById("downKeyId");

	//added by Mike, 20221019
	var buttonLeverCenterNeutralKey = document.getElementById("leverCenterNeutralKeyId");

	//added by Mike, 20221021
	var buttonLetterJKey = document.getElementById("letterJKeyId");
	var buttonLetterLKey = document.getElementById("letterLKeyId");
	var buttonLetterIKey = document.getElementById("letterIKeyId");
	var buttonLetterKKey = document.getElementById("letterKKeyId");

	//added by Mike, 20221019
	var buttonRightLeverCenterNeutralKey = document.getElementById("rightLeverCenterNeutralKeyId");
	
	//added by Mike, 20220912	
	var pauseLink = document.getElementById("pauseLinkId");
	var iPauseLinkHeight = (pauseLink.clientHeight);//+1; + "px";
	var iPauseLinkWidth = (pauseLink.clientWidth);//+1; + "px"

	//		alert("screen.height: "+screen.height); //533


	//added by Mike, 20220904
	//ANIMATION UPDATE
	 
	//added by Mike, 20220820
	//if class exists, remove; else, add the class;
	//humanTile.classList.toggle('Image64x64TileFrame2');	 

	//reference: https://www.w3schools.com/jsref/prop_html_classname.asp;
	//last accessed: 20220820
		
	//edited by Mike, 20221116
//	if (iHumanTileAnimationCount==iHumanTileAnimationCountMax) {
	if (iHumanTileAnimationCount<iHumanTileAnimationCountMax/2) {

		monsterTile.className='Image64x64TileFrame1';
		monsterTile.style.objectPosition="0px 0px";


		if (iFacingDirection==iFACING_DOWN) {
			//edited by Mike, 20221117
			//humanTile.style.objectPosition="0px 0px";
			
			if (bIsWalkingAction) {
				humanTile.style.objectPosition="0px -32px";
			}
			else {
				humanTile.style.objectPosition="0px 0px";
			}
		}
		else if (iFacingDirection==iFACING_RIGHT) {
			if (bIsWalkingAction) {
				humanTile.style.objectPosition="-64px -32px";
			}
			else {			
				humanTile.style.objectPosition="-64px 0px";
			}
		}
		else if (iFacingDirection==iFACING_LEFT) {
			if (bIsWalkingAction) {
				humanTile.style.objectPosition="-128px -32px";
			}
			else {
				humanTile.style.objectPosition="-128px 0px";
			}
		}	
		else if (iFacingDirection==iFACING_UP) {
			if (bIsWalkingAction) {
				humanTile.style.objectPosition="-32px -32px";
			}
			else {
				humanTile.style.objectPosition="-192px 0px";
			}
		}				
		
		iHumanTileAnimationCount++;
}
	else {

		monsterTile.className='Image64x64TileFrame2';	
		monsterTile.style.objectPosition="-64px 0px";
	
		if (iFacingDirection==iFACING_DOWN) {
			if (bIsWalkingAction) {
				humanTile.style.objectPosition="0px -64px";
			}
			else {			
				humanTile.style.objectPosition="-32px 0px";
			}
		}
		else if (iFacingDirection==iFACING_RIGHT) {
			if (bIsWalkingAction) {
				humanTile.style.objectPosition="-64px -64px";
			}
			else {			
				humanTile.style.objectPosition="-96px 0px";
			}
		}
		else if (iFacingDirection==iFACING_LEFT) {
			if (bIsWalkingAction) {
				humanTile.style.objectPosition="-128px -64px";
			}
			else {			
				humanTile.style.objectPosition="-160px 0px";
			}
		}
		else if (iFacingDirection==iFACING_UP) {
			if (bIsWalkingAction) {
				humanTile.style.objectPosition="-32px -64px";
			}
			else {			
				humanTile.style.objectPosition="-224px 0px";
			}
		}		
		//iHumanTileAnimationCount++;

		if (iHumanTileAnimationCount==iHumanTileAnimationCountMax) {
			iHumanTileAnimationCount=0;
		}
		else {
			iHumanTileAnimationCount++;
		}
	}

	//reference: https://www.w3schools.com/tags/canvas_fillrect.asp; 
	//last accessed: 2020911
	var myCanvas = document.getElementById("myCanvasId");
	var myCanvasContext = myCanvas.getContext("2d");
	//edited by Mike, 20221119
	myCanvasContext.fillStyle = "#000000"; //black; //"#ababab"; //"rgb(128,89,27)"; //"#604122"; //"blue";

	myCanvasContext.fillRect(0, 0, iStageMaxWidth, iStageMaxHeight);	

//alert (iHorizontalOffset);

//added by Mike, 20221002; edited by Mike, 20221005
//myCanvas.style.top = (0)+"px"; //iVerticalOffset+
myCanvas.style.top = (iVerticalOffsetInnerScreen+0)+"px"; //iVerticalOffset+

	//added by Mike, 20221012
	iHorizontalOffset=myCanvas.getBoundingClientRect().x;

	//edited by Mike, 20221120
	imgPuzzle.style.top = (iVerticalOffsetInnerScreen+0)+"px";
	imgPuzzle.style.left = (iHorizontalOffset+0)+"px";


	//edited by Mike, 20221012
	pauseLink.style.left = 0+iHorizontalOffset+iStageMaxWidth/2 -iPauseLinkWidth/2 +"px";
	pauseLink.style.top = 0+iStageMaxHeight +"px"; 
	pauseLink.style.visibility="visible";	  
	
	//identify offset due to smaller window centered @horizontal
/*	
	alert(screen.width);
	alert(screen.height);
*/

	//added by Mike, 20220911; edited by Mike, 2022117
/*
	let ihumanTileWidth = 32; //64;
	let ihumanTileHeight = 32; //64;
*/
	let iImgHumanTileWidth = 32; //64;
	let iImgHumanTileHeight = 32; //64;

	
/* //edited by Mike, 20221117
	let iStepX=5; //4;
	let iStepY=5; //4;
*/	
	let iStepX=2; //5;
	let iStepY=2; //5;


	//added by Mike, 20221030
	//TO-DO: -reverify: adding this in touchmove
	if (iTouchStartCount<iTouchEndCountMax) {
		
		//alert("iTouchStartCount: "+iTouchStartCount);
		
		if (iTouchStartCount>=iTouchEndCountMax) {
			iTouchEndX=iTouchStartX;
			iTouchEndY=iTouchStartY;
			handleGesture();
		}

		iTouchStartCount++;
	}

	if (bIsInitMiniGameAction) {
/*	
		humanTile.style.left = (iHorizontalOffset+iStageMaxWidth/2-ihumanTileWidth/2)+"px";	
		humanTile.style.top = (iVerticalOffsetInnerScreen+iStageMaxHeight/2-ihumanTileHeight/2)+"px";	
*/		
		humanTileX = iStageMaxWidth/2-iImgHumanTileWidth/2;
		humanTileY = iStageMaxHeight/2-iImgHumanTileHeight/2;	

		humanTile.style.left = (iHorizontalOffset+humanTileX)+"px";	
		humanTile.style.top = (iVerticalOffsetInnerScreen+humanTileY)+"px";	
		
		bIsInitMiniGameAction=false;
	}
	

	//added by Mike, 20221117
	var sNewTileLeft = (iHorizontalOffset+humanTileX)+"px";
	var sNewTileTop = (iVerticalOffsetInnerScreen+humanTileY)+"px";		
	
	if (humanTile.style.left!=sNewTileLeft) {
		humanTile.style.left=sNewTileLeft;
	}

	if (humanTile.style.top!=sNewTileTop) {
		humanTile.style.top=sNewTileTop;
	}
	
	//if (bKeyDownRight) { //key d
	if (arrayKeyPressed[iKEY_D]) {
		//humanTile.style.left =  iHorizontalOffset+humanTileX+iStepX+"px";
		//humanTile.style.left =  humanTileX+iStepX+"px";

		humanTileX+=iStepX;
		humanTile.style.left = (iHorizontalOffset+humanTileX)+"px";	
		
		//added by Mike, 20221116		
		iFacingDirection=iFACING_RIGHT;
		bIsWalkingAction=true;
	}	
	else if (arrayKeyPressed[iKEY_A]) {
		//humanTile.style.left =  iHorizontalOffset+humanTileX-iStepX+"px";				
		//humanTile.style.left =  humanTileX-iStepX+"px";				
		humanTileX-=iStepX;
		humanTile.style.left = (iHorizontalOffset+humanTileX)+"px";
		
		//added by Mike, 20221116
		//humanTile.src="<?php echo base_url('assets/images/tao.png');?>";

		//added by Mike, 20221116		
		iFacingDirection=iFACING_LEFT;
		bIsWalkingAction=true;
		

/* //edited by Mike, 20221116	
		if (iHumanTileAnimationCount==0) {
			humanTile.style.objectPosition="-64px 0";
		}
		else {
			humanTile.style.objectPosition="-64px -64px";
		}
*/		
		//alert("hallo");	
	}
	
	//edited by Mike, 2022117
	//note: inverted Y-axis; where: @top of window is 0px
	//if (arrayKeyPressed[iKEY_W]) {
	else if (arrayKeyPressed[iKEY_W]) {
//		humanTile.style.top = iVerticalOffset+humanTileY-iStepY+"px";				
		//humanTile.style.top = humanTileY-iStepY+"px";	
		humanTileY-=iStepY;	
		humanTile.style.top = (iVerticalOffsetInnerScreen+humanTileY)+"px";	
		
		//added by Mike, 20221116		
		iFacingDirection=iFACING_UP;
		bIsWalkingAction=true;
	}	
	else if (arrayKeyPressed[iKEY_S]) {
//		humanTile.style.top =  iVerticalOffset+humanTileY+iStepY+"px";				
//		humanTile.style.top =  humanTileY+iStepY+"px";				
		humanTileY+=iStepY;	
		humanTile.style.top = (iVerticalOffsetInnerScreen+humanTileY)+"px";	
		
		//added by Mike, 20221116		
		iFacingDirection=iFACING_DOWN;
		bIsWalkingAction=true;
		
//		alert("dito");
	}
	//added by Mike, 2022117
	else {
		bIsWalkingAction=false;
	}
		
	
	//added by Mike, 20221115
	//world stage max movement
/*	
alert("humanTile.style.left: "+humanTile.style.left);
alert("iHorizontalOffset: "+iHorizontalOffset);
*/
	//edited by Mike, 20221118; from 20221117
	const iWallWidth=iImgHumanTileWidth;
	const iWallHeight=iImgHumanTileHeight;
	
	if (iHorizontalOffset+humanTileX-iStepX < iHorizontalOffset+0+iWallWidth) {
		humanTile.style.left = (iHorizontalOffset)+iWallWidth+"px";
		humanTileX=0+iWallWidth;
	}
	else if (iHorizontalOffset+humanTileX+iImgHumanTileWidth+iStepX>iHorizontalOffset+0+iStageMaxWidth-iWallWidth) {
		humanTile.style.left = (iHorizontalOffset+iStageMaxWidth-iImgHumanTileWidth-iWallWidth)+"px";
		humanTileX=iStageMaxWidth-iImgHumanTileWidth-iWallWidth;
	}
	
	//iVerticalOffset
 //edited by Mike, 20221118	
	if (humanTileY-iStepY < 0+iWallHeight) {
		humanTile.style.top = (0+iWallHeight)+"px";
		humanTileY=0+iWallHeight;
	}

/*
	if (humanTileY-iStepY < 0) { //+iWallHeight) {
		humanTile.style.top = (0)+"px";
		humanTileY=0;
	}
*/	
	else if (humanTileY+iImgHumanTileHeight+iStepY>0+iStageMaxHeight-iWallHeight) {
		humanTile.style.top = (iStageMaxHeight-iImgHumanTileHeight-iWallHeight)+"px";
		humanTileY=iStageMaxHeight-iImgHumanTileHeight-iWallHeight;
	}

	//added by Mike, 20221115; from 20221106
//	humanTile.style.visibility="hidden";
	humanTile.style.visibility="visible";	
	

	//added by Mike, 20221101
	if (arrayKeyPressed[iKEY_I]) {
//		alert("iKEY_I");
	}

	if (arrayKeyPressed[iKEY_K]) {
//		alert("iKEY_K");
	}

	if (arrayKeyPressed[iKEY_J]) {
//		alert("iKEY_J");
	}

	if (arrayKeyPressed[iKEY_L]) {
//		alert("iKEY_L");
	}
	
	//added by Mike, 20220904
	//COLLISION DETECTION UPDATE
	
	mdo1=humanTile;
	mdo2=monsterTile;
	
	//TO-DO: -add: IF human is @CENTER,
	//IF SO, EXECUTE RHYTHM ACTION ATTACK; 
	//keyphrase: DEFENSE, CONTROLLER
	//TO-DO: -add: ACTION sound

	//added by Mike, 20221120
	//TO-DO: -reverify: this

	let iMax = 4;	

	//Monster Artificial Intelligence
//	if (iNoKeyPressCount>iNoKeyPressCountMax) {		
		if (bIsMonsterExecutingAttack) {	
//alert("iMonsterAttackIndex: "+iMonsterAttackIndex);		
			switch (iMonsterAttackIndex) {
				case iMonsterAttackIndexFromTopToBottom:
				
					if (iMonsterTileY+iImgMonsterTileHeight>iStageMaxHeight) {
						iNoKeyPressCount=0;
						bIsMonsterExecutingAttack=false;
					}
					else {						
						iMonsterTileY+=iMonsterStepY;
					}
					break;
				case iMonsterAttackIndexFromBottomToTop:
					if (iMonsterTileY<0) {
						iNoKeyPressCount=0;
						bIsMonsterExecutingAttack=false;
					}
					else {						
						iMonsterTileY-=iMonsterStepY;
					}
					break;
				case iMonsterAttackIndexFromLeftToRight:
					if (iMonsterTileX+iImgMonsterTileWidth>(iStageMaxWidth)) {
						iNoKeyPressCount=0;
						bIsMonsterExecutingAttack=false;
					}
					else {						
						iMonsterTileX+=iMonsterStepX;
					}
					break;
				case iMonsterAttackIndexFromRightToLeft:
					if (iMonsterTileX<0) {
						iNoKeyPressCount=0;
						bIsMonsterExecutingAttack=false;
					}
					else {						
						iMonsterTileX-=iMonsterStepX;
					}
					break;
			}
			
			mdo2.style.left = (iHorizontalOffset+iMonsterTileX)+"px";			
			mdo2.style.top = iMonsterTileY+"px";	
		}		
		
	if (iNoKeyPressCount>iNoKeyPressCountMax) {				
		//note: NOT using ELSE 
		//due to bIsMonsterExecutingAttack shall be set
		if (!bIsMonsterExecutingAttack) {				
			iMonsterAttackIndex = Math.floor(Math.random() * iMax); 
			
			switch (iMonsterAttackIndex) {
				case iMonsterAttackIndexFromTopToBottom:
					
					/*
					mdo2.style.left = (iHorizontalOffset+0+iStageMaxWidth/2-iImgMonsterTileWidth/2)+"px";			
					mdo2.style.top =  0+"px";
					*/

					iMonsterTileX=(0+iStageMaxWidth/2-iImgMonsterTileWidth/2);	
					iMonsterTileY=0;					
					break;
				case iMonsterAttackIndexFromBottomToTop:
/*				
					mdo2.style.left = (iHorizontalOffset+0+iStageMaxWidth/2-iImgMonsterTileWidth/2)+"px";			
					mdo2.style.top =  (iStageMaxHeight-iImgMonsterTileHeight)+"px";
*/
					iMonsterTileX=(0+iStageMaxWidth/2-iImgMonsterTileWidth/2);	
					iMonsterTileY=(iStageMaxHeight-iImgMonsterTileHeight);					
					break;
				case iMonsterAttackIndexFromLeftToRight:
/*				
					mdo2.style.left = (iHorizontalOffset+0)+"px";			
					mdo2.style.top =  (iStageMaxHeight/2-iImgMonsterTileHeight/2)+"px";
*/					
					
					iMonsterTileX=(0);	
					iMonsterTileY=(iStageMaxHeight/2-iImgMonsterTileHeight/2);					
					break;
				case iMonsterAttackIndexFromRightToLeft:
/*				
					mdo2.style.left = (iHorizontalOffset+iStageMaxWidth-iImgMonsterTileWidth)+"px";			
					mdo2.style.top =  (iStageMaxHeight/2-iImgMonsterTileHeight/2)+"px";
*/
					iMonsterTileX=(iStageMaxWidth-iImgMonsterTileWidth);	
					iMonsterTileY=(iStageMaxHeight/2-iImgMonsterTileHeight/2);					
					break;
			}							
		
			mdo2.style.left = (iHorizontalOffset+iMonsterTileX)+"px";			
			mdo2.style.top = iMonsterTileY+"px";	
			
			bIsMonsterExecutingAttack=true;
			
			//alert("dito: "+iMonsterAttackIndex);
		}	
	}

	iNoKeyPressCount++;

	if (isIntersectingRect(mdo1, mdo2)) {
		//added by Mike, 20221121
		//TO-DO: -add: HIT EFFECT
		if (bIsMonsterExecutingAttack) {
			alert("COLLISION!");
		}
		
		mdo2.style.visibility="hidden";
		iNoKeyPressCount=0;
		bIsMonsterExecutingAttack=false;
	}
	
	//regenerate
	if (mdo2.style.visibility=="hidden") {

		let mdo2XPos = mdo2.getBoundingClientRect().x;
		let mdo2YPos = mdo2.getBoundingClientRect().y;	

/*	
		mdo2.style.left =  mdo2XPos+iStepX+"px";				
		mdo2.style.left =  mdo2YPos-iStepX+"px";
*/		
		//remembers: BOSS Battle with PANIKI in ALAMAT ng AGIMAT (J2ME)
		//reference: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random;
		//last accessed: 20220904

		//let iMax = 4;	//removed by Mike, 20221120
		
		iCorner = Math.floor(Math.random() * iMax); 
		//clock-wise count, 
		//where: 0 = TOP-LEFT, 1 = TOP-RIGHT, 2, = BOTTOM-RIGHT, 4 = BOTTOM-LEFT
		
		//added by Mike, 20221117
		iVerticalOffset=0;

/*		//removed by Mike, 20221120
		//edited by Mike, 20221120
		iImgMonsterTileWidth=64; //32;
		iImgMonsterTileHeight=64; //32;
*/
		//edited by Mike, 20220925			
		//alert("iCorner: "+iCorner);		
				
		if (iCorner==0) { //TOP-LEFT
			//edited by Mike, 20220911
			//mdo2.style.left = "0px";				
			mdo2.style.left = (iHorizontalOffset+0)+"px";			
			mdo2.style.top =  iVerticalOffset+"px";//"0px";
		}
		else if (iCorner==1) { //TOP-RIGHT
			//edited by Mike, 20220911
			//mdo2.style.left = iStageMaxWidth+"px";				
			mdo2.style.left = (iHorizontalOffset+iStageMaxWidth-iImgMonsterTileWidth)+"px";			
			mdo2.style.top =  iVerticalOffset+ "px";//"0px";
		}
		else if (iCorner==2)  { //BOTTOM-RIGHT
			//edited by Mike, 20220911
			//mdo2.style.left = iStageMaxWidth+"px";				
			mdo2.style.left = (iHorizontalOffset+iStageMaxWidth-iImgMonsterTileWidth)+"px";
			//mdo2.style.top = iStageMaxHeight+"px";
			mdo2.style.top =  iVerticalOffset+(iStageMaxHeight-iImgMonsterTileHeight)+"px";
		}
		else if (iCorner==3) { //BOTTOM-LEFT
			//edited by Mike, 20220911
			//mdo2.style.left = "0px";				
			mdo2.style.left = (iHorizontalOffset+0)+"px";				
			//mdo2.style.top = iStageMaxHeight+"px";
			mdo2.style.top =  iVerticalOffset+(iStageMaxHeight-iImgMonsterTileHeight)+"px";
		}

		mdo2.style.visibility="visible";	
	}
	

/*	//removed by Mike, 20221120	
	//added by Mike, 20220915
	//verified: object position movement in Android Samsung Duos
	//to be NOT noticeably delayed for moving object count = 1

	let imgMonsterTileX = monsterTile.getBoundingClientRect().x;
	let imgMonsterTileY = monsterTile.getBoundingClientRect().y;	
	
	//added by Mike, 20221002
	//note: getBoundingClientRect().width includes all animation frame sequence
//	let iImgMonsterTileWidth = monsterTile.getBoundingClientRect().width;
	let iImgMonsterTileWidth = 64; 
*/	

/* //removed by Mike, 20221118	
	if (imgMonsterTileY+iMonsterStepY<(iVerticalOffset+0)) {
		iMonsterStepY=10; //*=-1;
	}
	else if (imgMonsterTileY+ihumanTileHeight+iMonsterStepY>(iVerticalOffset+iStageMaxHeight)) {
		iMonsterStepY=-10;
		
		//alert (monsterTile.style.top);
	}
*/

	//edited by Mike, 20221002
	//monsterTile.style.top = 0+iVerticalOffset+imgMonsterTileY+iMonsterStepY +"px"; 
	//monsterTile.style.left = 0+iHorizontalOffset+"px"; 
	
/* //removed by Mike, 20221120	
	monsterTile.style.top = 0+"px"; //iVerticalOffset //note: control buttons offset
	monsterTile.style.left = 0+iHorizontalOffset+iStageMaxWidth-iImgMonsterTileWidth+"px"; 
*/

	
			

	//added by Mike, 20221108; edited by Mike, 20221114
	if (bHasPressedStart) {
/* //removed by Mike, 20221115	
		if (bIsInitAutoGeneratePuzzleFromEnd) {
			if (iDelayAnimationCountMovementStep==iDelayAnimationCountMovementStepMax) 	
			{
				autoGeneratePuzzleFromEnd();
				iDelayAnimationCountMovementStep=0;
			}
			else {
				iDelayAnimationCountMovementStep++;
			}
		}	
*/		
	}
		
	//added by Mike, 20220917	


	//alert (buttonLeftKey.getBoundingClientRect().width);	//Example Output: 47.28334045410156
	var iButtonWidth = buttonUpKey.getBoundingClientRect().width;
	var iButtonHeight = buttonUpKey.getBoundingClientRect().height;


	//if (!document.fullscreenElement) {	
	if ((!bIsMobile) || (bIsUsingAppleMac)) {				
		buttonUpKey.style.visibility = "hidden";		
		buttonLeftKey.style.visibility = "hidden";
		buttonRightKey.style.visibility = "hidden";
		buttonDownKey.style.visibility = "hidden";
		
		//added by Mike, 20221019
		buttonLeverCenterNeutralKey.style.visibility = "hidden";
		
		//added by Mike, 20221021
		buttonLetterIKey.style.visibility = "hidden";		
		buttonLetterJKey.style.visibility = "hidden";
		buttonLetterLKey.style.visibility = "hidden";
		buttonLetterKKey.style.visibility = "hidden";
		
		buttonRightLeverCenterNeutralKey.style.visibility = "hidden";
	}
	else {
				
		//edited by Mike, 20221108
		if (bIsUsingAppleWebKit) {
			iVerticalOffset=(iStageMaxHeight+buttonUpKey.clientHeight*3);			

			//alert(screen.orientation); //OUTPUT: [object ScreenOrientation]

	
			//alert(window.innerWidth);
			
			//note: CHANGE in orientation
			if (iCurrentAppleWebKitInnerWidth!=window.innerWidth) {
				iCurrentAppleWebKitInnerWidth=window.innerWidth;
/*				
				screen.width=iCurrentAppleWebKitInnerWidth;
				alert(screen.width);
*/				
				iAppleWebKitInnerWidthOffset=iCurrentAppleWebKitInnerWidth-screen.width;
				
				if (iAppleWebKitInnerWidthOffset<0) {
					iAppleWebKitInnerWidthOffset*=(-1);
				}
			}
			
		}
		else {			
			//added by Mike, 20221002
			iVerticalOffset=(iStageMaxHeight+(screen.height/1.5-iStageMaxHeight));
			
			//alert(screen.orientation); //OUTPUT: [object ScreenOrientation]

			if (window.matchMedia("(orientation: landscape)").matches) {
				//note: for CONTROLLER BUTTONS
				iVerticalOffset=(screen.height-buttonUpKey.clientHeight*3); //set to 3 button height from the bottom
			}				
		}
			
		buttonUpKey.style.left = (0)+iButtonWidth*1+"px";
		buttonUpKey.style.top =  iVerticalOffset+"px"; //iStageMaxHeight+"px";
		buttonUpKey.style.visibility = "visible";
		
		buttonLeftKey.style.left = (0)+"px";
		buttonLeftKey.style.top =  iVerticalOffset+iButtonHeight*1+"px"; //iStageMaxHeight+iButtonHeight*1+"px";
		buttonLeftKey.style.visibility = "visible";

		//added by Mike, 20221019
		buttonLeverCenterNeutralKey.style.left = (0)+iButtonWidth*1+"px";
		buttonLeverCenterNeutralKey.style.top =  iVerticalOffset+iButtonHeight*1+"px"; 
		buttonLeverCenterNeutralKey.style.visibility = "visible";

		buttonRightKey.style.left = (0)+iButtonWidth*2+"px";
		buttonRightKey.style.top =  iVerticalOffset+iButtonHeight*1+"px";//iStageMaxHeight+iButtonHeight*1+"px";
		buttonRightKey.style.visibility = "visible";

		buttonDownKey.style.left = (0)+iButtonWidth*1+"px";
		buttonDownKey.style.top =  iVerticalOffset+iButtonHeight*2+"px"; //iStageMaxHeight+iButtonHeight*2+"px";
		buttonDownKey.style.visibility = "visible";

		
		//added by Mike, 20221021
		buttonLetterIKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth*2+"px";
		buttonLetterIKey.style.top =  iVerticalOffset+"px"; //iStageMaxHeight+"px";
		buttonLetterIKey.style.visibility = "visible";
		
		buttonLetterJKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth*3+"px";
		buttonLetterJKey.style.top =  iVerticalOffset+iButtonHeight*1+"px"; //iStageMaxHeight+iButtonHeight*1+"px";
		buttonLetterJKey.style.visibility = "visible";

		//added by Mike, 20221019
		buttonRightLeverCenterNeutralKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth*2+"px";
		buttonRightLeverCenterNeutralKey.style.top =  iVerticalOffset+iButtonHeight*1+"px"; 
		buttonRightLeverCenterNeutralKey.style.visibility = "visible";

		buttonLetterLKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth+"px";
		buttonLetterLKey.style.top =  iVerticalOffset+iButtonHeight*1+"px";//iStageMaxHeight+iButtonHeight*1+"px";
		buttonLetterLKey.style.visibility = "visible";

		buttonLetterKKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth*2+"px";
		buttonLetterKKey.style.top =  iVerticalOffset+iButtonHeight*2+"px"; //iStageMaxHeight+iButtonHeight*2+"px";
		buttonLetterKKey.style.visibility = "visible";
	}

					
}


function miniGamePuzzleUpdate() {
	var imgUsbongLogo = document.getElementById("usbongLogoId");
	//imgUsbongLogo.style.visibility="hidden";
	
	//added by Mike, 20220820
	var humanTile = document.getElementById("humanTileImageId");

	//added by Mike, 20220904
	var monsterTile = document.getElementById("monsterTileImageId");

/*	//removed by Mike, 20221120
	//added by Mike, 20221118
	monsterTile.style.visibility="visible";	
*/	
		
	//added by Mike, 20221104; edited by Mike, 20221118
//	var imgPuzzle;
	if (document.getElementById("puzzleImageId")==null) {
		//alert("dito");
		//reference: https://www.w3schools.com/jsref/met_node_removechild.asp;
		//last accessed: 2022118
		const imgPuzzleChild = document.adoptNode(imgPuzzle);
		document.body.appendChild(imgPuzzleChild);		
	}

	imgPuzzle = document.getElementById("puzzleImageId");
	//added by Mike, 2022118
	imgPuzzle.setAttribute("src", getBaseURL()+"assets/images/mtPinatubo20150115T1415.jpg");
	imgPuzzle.setAttribute("class", "ImageBackgroundOfPuzzle");

	//added by Mike, 20221105
	imgPuzzle.style.visibility="visible";	
	imgPuzzle.style.zIndex=0; //added by Mike, 20221118
		
	//added by Mike, 20220917; edited by Mike, 20220918
	//var linkAsButtonLeftKey = document.getElementById("leftKeyId");
	var buttonLeftKey = document.getElementById("leftKeyId");
	var buttonRightKey = document.getElementById("rightKeyId");
	var buttonUpKey = document.getElementById("upKeyId");
	var buttonDownKey = document.getElementById("downKeyId");

	//added by Mike, 20221019
	var buttonLeverCenterNeutralKey = document.getElementById("leverCenterNeutralKeyId");

	//added by Mike, 20221021
	var buttonLetterJKey = document.getElementById("letterJKeyId");
	var buttonLetterLKey = document.getElementById("letterLKeyId");
	var buttonLetterIKey = document.getElementById("letterIKeyId");
	var buttonLetterKKey = document.getElementById("letterKKeyId");

	//added by Mike, 20221019
	var buttonRightLeverCenterNeutralKey = document.getElementById("rightLeverCenterNeutralKeyId");
	

	//added by Mike, 20220912	
	var pauseLink = document.getElementById("pauseLinkId");
	var iPauseLinkHeight = (pauseLink.clientHeight);//+1; + "px";
	var iPauseLinkWidth = (pauseLink.clientWidth);//+1; + "px"

	//		alert("screen.height: "+screen.height); //533


	//added by Mike, 20220904
	//ANIMATION UPDATE
	if (iMonsterTileAnimationCount==iMonsterTileAnimationCountMax) {
		if (monsterTile.className=='Image64x64TileFrame2') {
		  monsterTile.className='Image64x64TileFrame1';
		}
		else {
		  monsterTile.className='Image64x64TileFrame2';
		}
		iMonsterTileAnimationCount=0;
	}
	else {
		iMonsterTileAnimationCount++;
	}
	

	//reference: https://www.w3schools.com/tags/canvas_fillrect.asp; 
	//last accessed: 2020911
	var myCanvas = document.getElementById("myCanvasId");
	var myCanvasContext = myCanvas.getContext("2d");
	//TO-DO: -add: center align of bigger window 
	//TO-DO: -reverify: this
	myCanvasContext.fillRect(0, 0, iStageMaxWidth, iStageMaxHeight);	

//alert (iHorizontalOffset);

//added by Mike, 20221002; edited by Mike, 20221005
//myCanvas.style.top = (0)+"px"; //iVerticalOffset+
myCanvas.style.top = (iVerticalOffsetInnerScreen+0)+"px"; //iVerticalOffset+

	//added by Mike, 20221012
	iHorizontalOffset=myCanvas.getBoundingClientRect().x;

	//added by Mike, 20221118
	imgPuzzle.style.top = (iVerticalOffsetInnerScreen+0)+"px";
	imgPuzzle.style.left = (iHorizontalOffset+0)+"px";


	//edited by Mike, 20221012
	pauseLink.style.left = 0+iHorizontalOffset+iStageMaxWidth/2 -iPauseLinkWidth/2 +"px";
	pauseLink.style.top = 0+iStageMaxHeight +"px"; 
	pauseLink.style.visibility="visible";	  
	
	//identify offset due to smaller window centered @horizontal
/*	
	alert(screen.width);
	alert(screen.height);
*/

	//added by Mike, 20220911
	let ihumanTileWidth = 64;
	let ihumanTileHeight = 64;
	
	//edited by Mike, 20220823; edited again by Mike, 20221019
/*
	let iStepX=10; //4;
	let iStepY=10; //4;
*/
	let iStepX=5; //4;
	let iStepY=5; //4;


	//added by Mike, 20221030
	//TO-DO: -reverify: adding this in touchmove
	if (iTouchStartCount<iTouchEndCountMax) {
		
		//alert("iTouchStartCount: "+iTouchStartCount);
		
		if (iTouchStartCount>=iTouchEndCountMax) {
			iTouchEndX=iTouchStartX;
			iTouchEndY=iTouchStartY;
			handleGesture();
		}

		iTouchStartCount++;
	}

	
	//added by Mike, 20221012
	//notes: what is @100%, IF @start, @120% zoom scale?
	//alert(window.innerWidth); //130%; 631px
	//alert(window.innerWidth); //110%; 751px
	//alert(window.innerWidth); //100%; 819px
	
	//removed by Mike, 20221012
	//iHorizontalOffset=myCanvas.getBoundingClientRect().x;
	//humanTile.style.left = (iHorizontalOffset+humanTileY)+"px";	
	//humanTile.style.left = (iHorizontalOffset+humanTileX)+"px";	

	//if (bKeyDownRight) { //key d
	if (arrayKeyPressed[iKEY_D]) {
		//humanTile.style.left =  iHorizontalOffset+humanTileX+iStepX+"px";
		//humanTile.style.left =  humanTileX+iStepX+"px";

		humanTileX+=iStepX;
		//humanTile.style.left =  iHorizontalOffset+humanTileX +"px";
	}	
	else if (arrayKeyPressed[iKEY_A]) {
		//humanTile.style.left =  iHorizontalOffset+humanTileX-iStepX+"px";				
		//humanTile.style.left =  humanTileX-iStepX+"px";				
		humanTileX-=iStepX;
		//humanTile.style.left =  iHorizontalOffset+humanTileX +"px";
	}

	
	//note: inverted Y-axis; where: @top of window is 0px
	if (arrayKeyPressed[iKEY_W]) {
//		humanTile.style.top = iVerticalOffset+humanTileY-iStepY+"px";				
		//humanTile.style.top = humanTileY-iStepY+"px";	
		humanTileY-=iStepY;	
		
		//humanTile.style.top = iVerticalOffsetInnerScreen+humanTileY+"px";	
	}	
	else if (arrayKeyPressed[iKEY_S]) {
//		humanTile.style.top =  iVerticalOffset+humanTileY+iStepY+"px";				
//		humanTile.style.top =  humanTileY+iStepY+"px";				
		humanTileY+=iStepY;	
		
		//humanTile.style.top = iVerticalOffsetInnerScreen+humanTileY+"px";		
	}

/*	//removed by Mike, 20221106; 
	//TO-DO: -add: as CASE @MINIGAME with IPIS

	humanTile.style.left = (iHorizontalOffset+humanTileX)+"px";	

	//added by Mike, 20221029
	humanTile.style.top = (iVerticalOffsetInnerScreen+humanTileY)+"px";	
*/	
	//added by Mike, 20221115; from 20221106
	humanTile.style.visibility="hidden";
//	humanTile.style.visibility="visible";	
	
	//added by Mike, 20221104		
	imgPuzzle.style.left = (iHorizontalOffset-iStageMaxWidth/2)+"px";	

	imgPuzzle.style.top = (iVerticalOffsetInnerScreen-iStageMaxHeight/2)+"px";	
/*
	imgPuzzle.style.left = (0)+"px";	
	imgPuzzle.style.top = (0)+"px";	
*/	
	
	//added by Mike, 20221101
	if (arrayKeyPressed[iKEY_I]) {
//		alert("iKEY_I");
	}

	if (arrayKeyPressed[iKEY_K]) {
//		alert("iKEY_K");
	}

	if (arrayKeyPressed[iKEY_J]) {
//		alert("iKEY_J");
	}

	if (arrayKeyPressed[iKEY_L]) {
//		alert("iKEY_L");
	}
		
	monsterTile.style.top = 0+"px"; //iVerticalOffset //note: control buttons offset
	monsterTile.style.left = 0+iHorizontalOffset+iStageMaxWidth-iImgMonsterTileWidth+"px"; 

	monsterTile.style.visibility="visible";	


	//reference: https://stackoverflow.com/questions/7545641/how-to-create-multidimensional-array;
	//last accessed: 20221105
	//answer by: Dan, 20150107T2231 
	//edited by: Nadav, 20131113T1000
	//removed by Mike, 20221105
	//var arrayPuzzleTilePos = [ [],[],[],[] ]; 

	let iTileBgCount=0;
	let iPuzzleTileWidth=32;
	let iPuzzleTileHeight=32;
	
	const iPuzzleTileTotalWidthMax=iPuzzleTileWidth*iColumnCountMax;
	const iPuzzleTileTotalHeightMax=iPuzzleTileHeight*iRowCountMax;
/*	
	alert(iPuzzleTileWidth);
	alert (iPuzzleTileTotalMaxWidth);
*/	
	//edited by Mike, 20221113
	const iBorderOffset=0; //2;
	const iOffsetWidth=iStageMaxWidth/2-iPuzzleTileTotalWidthMax/2;
	const iOffsetHeight=iStageMaxHeight/2-iPuzzleTileTotalHeightMax/2;
	
	//removed by Mike, 20221106
	//16=4*4
	//const iTileBgCountMax=iRowCountMax*iColumnCountMax;	
	
	//added by Mike, 20221113
	var bHasExecutedTileExchange=false;

	//added by Mike, 2022119
	var puzzleTileImageTargetBorder = document.getElementById("divPuzzleTileImageTargetBorderId");
	
	
//	for (let iTileBgCount=0; iTileBgCount<16; iTileBgCount++) {		
	for (iRowCount=0; iRowCount<iRowCountMax; iRowCount++) {		
		for (iColumnCount=0; iColumnCount<iColumnCountMax; iColumnCount++) {
		
		//edited by Mike, 20221118
		//arrayPuzzleTileCountId[iTileBgCount] = document.getElementById("puzzleTileImageIdBg"+iTileBgCount);
	
		arrayPuzzleTileCountId[iTileBgCount] = document.getElementById("puzzleTileImageIdBg"+iTileBgCount);
	
		//added by Mike, 20221118
		//reference: https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_img_create;
		//last accessed: 20221118	
		arrayPuzzleTileCountId[iTileBgCount].setAttribute("src", getBaseURL()+"assets/images/count1024x1024.png");

	
		//alert(iTileBgCount);

		arrayPuzzleTileCountId[iTileBgCount].style.left = iHorizontalOffset+iOffsetWidth+iPuzzleTileWidth*iColumnCount+iBorderOffset*iColumnCount+"px";
		
//		arrayPuzzleTileCountId[iTileBgCount].style.top = iVerticalOffset+iPuzzleTileHeight*iColumnCount+"px";
		arrayPuzzleTileCountId[iTileBgCount].style.top = 0+iOffsetHeight+iPuzzleTileHeight*iRowCount+iBorderOffset*iRowCount+"px";

//		alert (iPuzzleTileWidth*iRowCount);


		arrayPuzzleTileCountId[iTileBgCount].style.visibility="visible";
		
		//added by Mike, 20221106; removed by Mike, 20221106
		//note: effect
		//arrayPuzzleTileCountId[iTileBgCount].className="Image32x32Tile";

		//alert(arrayPuzzleTileCountId[iTileBgCount].style.verticalAlign); 
		
	
//edited by Mike, 20221105; note: last tile @#16, space
		//edited by Mike, 20221106
//		if (iTileBgCount==iTileBgCountMax-1) {
	
		if (arrayPuzzleTileCountId[iTileBgCount].alt=="") {
			//reminder: @last tile #16, space
			//pressed up, tile above the space
			if (arrayKeyPressed[iKEY_W]) {
			//alert(iRowCount);
				if ((iRowCount-1)>=0) {
					iTargetTileBgCount=arrayPuzzleTilePos[iRowCount-1][iColumnCount];
					
					arrayPuzzleTileCountId[iTargetTileBgCount].className="Image32x32TileTarget";
					

					//added by Mike, 20221119
					puzzleTileImageTargetBorder.style.left = iHorizontalOffset+iOffsetWidth+iPuzzleTileWidth*iColumnCount+"px";
					
					puzzleTileImageTargetBorder.style.top = 0+iOffsetHeight+iPuzzleTileHeight*(iRowCount-1)+"px";
					
					puzzleTileImageTargetBorder.style.visibility = "visible";

					iHorizontalOffsetOfTargetBorder	= iHorizontalOffset;
				//arrayPuzzleTileCountId[iTileBgCount].className="Image32x32TileSpace";
					
					bIsTargetAtSpace=false;
				}	
			}
			else if (arrayKeyPressed[iKEY_S]) {
				//edited by Mike, 20221106
//				if ((iRowCount+1)<=iRowCountMax-1) {
				if ((iRowCount+1)<iRowCountMax) {
					iTargetTileBgCount=arrayPuzzleTilePos[iRowCount+1][iColumnCount];
					
					//alert(iTargetTileBgCount);

					arrayPuzzleTileCountId[iTargetTileBgCount].className="Image32x32TileTarget";
				
				//arrayPuzzleTileCountId[iTileBgCount].className="Image32x32TileSpace";
				
				
					//added by Mike, 20221119
					puzzleTileImageTargetBorder.style.left = iHorizontalOffset+iOffsetWidth+iPuzzleTileWidth*iColumnCount+"px";
					//puzzleTileImageTargetBorder.style.left = iOffsetWidth+iPuzzleTileWidth*iColumnCount+"px";
					
					puzzleTileImageTargetBorder.style.top = 0+iOffsetHeight+iPuzzleTileHeight*(iRowCount+1)+"px";
					
					puzzleTileImageTargetBorder.style.visibility = "visible";
				
					iHorizontalOffsetOfTargetBorder	= iHorizontalOffset;
				
					bIsTargetAtSpace=false;
				}	
			}
			else if (arrayKeyPressed[iKEY_A]) {						
				if ((iColumnCount-1)>=0) {
					iTargetTileBgCount=arrayPuzzleTilePos[iRowCount][iColumnCount-1];

					arrayPuzzleTileCountId[iTargetTileBgCount].className="Image32x32TileTarget";
				
				//arrayPuzzleTileCountId[iTileBgCount].className="Image32x32TileSpace";
				
					//added by Mike, 20221119
					puzzleTileImageTargetBorder.style.left = iHorizontalOffset+iOffsetWidth+iPuzzleTileWidth*(iColumnCount-1)+"px";

					//puzzleTileImageTargetBorder.style.left = iOffsetWidth+iPuzzleTileWidth*(iColumnCount-1)+"px";
					
					puzzleTileImageTargetBorder.style.top = 0+iOffsetHeight+iPuzzleTileHeight*(iRowCount)+"px";
					
					puzzleTileImageTargetBorder.style.visibility = "visible";

					iHorizontalOffsetOfTargetBorder	= iHorizontalOffset;
								
					bIsTargetAtSpace=false;
				}	
			}			
			else if (arrayKeyPressed[iKEY_D]) {
				//edited by Mike, 20221106				
//				if ((iColumnCount+1)<=iColumnCountMax-1) {
				if ((iColumnCount+1)<iColumnCountMax) {
					iTargetTileBgCount=arrayPuzzleTilePos[iRowCount][iColumnCount+1];

					arrayPuzzleTileCountId[iTargetTileBgCount].className="Image32x32TileTarget";
				
				//arrayPuzzleTileCountId[iTileBgCount].className="Image32x32TileSpace";
								
					//added by Mike, 20221119
					puzzleTileImageTargetBorder.style.left = iHorizontalOffset+iOffsetWidth+iPuzzleTileWidth*(iColumnCount+1)+"px";
					
					puzzleTileImageTargetBorder.style.top = 0+iOffsetHeight+iPuzzleTileHeight*(iRowCount)+"px";
					
					puzzleTileImageTargetBorder.style.visibility = "visible";
								
					iHorizontalOffsetOfTargetBorder	= iHorizontalOffset;
								
					bIsTargetAtSpace=false;
				}	
			}			
			else {	
				//arrayPuzzleTileCountId[iTileBgCount].className="Image32x32TileSpaceTarget";		
				bIsTargetAtSpace=true;				
			}
	
	
			//added by Mike, 20221119			
			if (iHorizontalOffsetOfTargetBorder	!= iHorizontalOffset) {
			
				puzzleTileImageTargetBorder.style.left = (puzzleTileImageTargetBorder.style.left.replace("px","")-iHorizontalOffsetOfTargetBorder+iHorizontalOffset)+"px";			
				
				iHorizontalOffsetOfTargetBorder=iHorizontalOffset;
			}

			
			if (bIsTargetAtSpace) {	
				//added by Mike, 20221113; removed by Mike, 20221113
				//if (arrayPuzzleTileCountId[iTileBgCount].alt=="") {
					
				if (iTargetAtSpaceBlinkAnimationCount==iTargetAtSpaceBlinkAnimationCountMax) {
					if (arrayPuzzleTileCountId[iTileBgCount].className=='Image32x32TileSpace') {
					arrayPuzzleTileCountId[iTileBgCount].className="Image32x32TileSpaceTarget";
					}
					else {
					arrayPuzzleTileCountId[iTileBgCount].className="Image32x32TileSpace";
					}
					iTargetAtSpaceBlinkAnimationCount=0;
				}
				else {
					iTargetAtSpaceBlinkAnimationCount++;
				}				
//alert(iTargetAtSpaceBlinkAnimationCount);	


			
			}				
			else {				
				//edited by Mike, 20221113
				for (iCount=0; iCount<iTotalKeyCount; iCount++) {
//				for (iCount=0; iCount<iDirectionTotalKeyCount; iCount++) {
					
					//if a key has been pressed
					if (arrayKeyPressed[iCount]==true) {
												//alert("dito");
						//set adjacent tiles to be not the TARGET as default 
						if (!arrayKeyPressed[iKEY_W]) {						
							if ((iRowCount-1)>=0) {
								arrayPuzzleTileCountId[arrayPuzzleTilePos[iRowCount-1][iColumnCount]].className="Image32x32Tile";
								
							}	
						}

						if (!arrayKeyPressed[iKEY_S]) {
							
							//edited by Mike, 20221106
	//						if ((iRowCount+1)<iRowCountMax-1) {
							if ((iRowCount+1)<iRowCountMax) {
			arrayPuzzleTileCountId[arrayPuzzleTilePos[iRowCount+1][iColumnCount]].className="Image32x32Tile";
							}
						}
						
						if (!arrayKeyPressed[iKEY_A]) {
							if ((iColumnCount-1)>=0) {
								arrayPuzzleTileCountId[arrayPuzzleTilePos[iRowCount][iColumnCount-1]].className="Image32x32Tile";
							}		
						}						
						
						if (!arrayKeyPressed[iKEY_D]) {						
							//edited by Mike, 20221106
							//if ((iColumnCount+1)<iColumnCountMax-1) {
							if ((iColumnCount+1)<iColumnCountMax) {
								arrayPuzzleTileCountId[arrayPuzzleTilePos[iRowCount][iColumnCount+1]].className="Image32x32Tile";					
							}	
						}
						
						break;						
					}
				}
			}
			
			
			

			//added by Mike, 20221106;
			//edited by Mike, 20221106
//			if (arrayKeyPressed[iKEY_J]) {
			if ((arrayKeyPressed[iKEY_J]) ||
				(arrayKeyPressed[iKEY_L]) ||
				(arrayKeyPressed[iKEY_I]) ||
				(arrayKeyPressed[iKEY_K])) {
				//reminder: iTileBgCount = iTileBgCountMax-1
			
			
			//added by Mike, 20221108
	
			if (iTargetTileBgCount==-1) {
				break;
			}
			
				arrayPuzzleTileCountId[iTileBgCount].className="Image32x32Tile";
				
				arrayPuzzleTileCountId[iTargetTileBgCount].className="Image32x32TileSpace";

				arrayPuzzleTileCountId[iTileBgCount].alt=arrayPuzzleTileCountId[iTargetTileBgCount].alt;


				arrayPuzzleTileCountId[iTargetTileBgCount].alt="";


				bIsTargetAtSpace=true;
				
				//added by Mike, 20221113
				bHasExecutedTileExchange=true;
			}	
			
			//added by Mike, 20221106
			//iDirectionTotalKeyCount
			for (iCount=0; iCount<iTotalKeyCount; iCount++) {
				arrayKeyPressed[iCount]=false;	
			}
		}				
		
		iTileBgCount++;
		//alert("iTileBgCount: "+iTileBgCount);		
		}
	}


	//added by Mike, 20221108; edited by Mike, 20221114
	if (bHasPressedStart) {
		if (bIsInitAutoGeneratePuzzleFromEnd) {
			if (iDelayAnimationCountMovementStep==iDelayAnimationCountMovementStepMax) 	
			{
				autoGeneratePuzzleFromEnd();
				iDelayAnimationCountMovementStep=0;
			}
			else {
				iDelayAnimationCountMovementStep++;
			}
		}	
	}
		
	//added by Mike, 20220917	


	//alert (buttonLeftKey.getBoundingClientRect().width);	//Example Output: 47.28334045410156
	var iButtonWidth = buttonUpKey.getBoundingClientRect().width;
	var iButtonHeight = buttonUpKey.getBoundingClientRect().height;



	//if (!document.fullscreenElement) {	
	if ((!bIsMobile) || (bIsUsingAppleMac)) {
		buttonUpKey.style.visibility = "hidden";		
		buttonLeftKey.style.visibility = "hidden";
		buttonRightKey.style.visibility = "hidden";
		buttonDownKey.style.visibility = "hidden";
		
		//added by Mike, 20221019
		buttonLeverCenterNeutralKey.style.visibility = "hidden";
		
		//added by Mike, 20221021
		buttonLetterIKey.style.visibility = "hidden";		
		buttonLetterJKey.style.visibility = "hidden";
		buttonLetterLKey.style.visibility = "hidden";
		buttonLetterKKey.style.visibility = "hidden";
		
		buttonRightLeverCenterNeutralKey.style.visibility = "hidden";
	}
	else {
		//edited by Mike, 20221108
		if (bIsUsingAppleWebKit) {
			iVerticalOffset=(iStageMaxHeight+buttonUpKey.clientHeight*3);			

			//alert(screen.orientation); //OUTPUT: [object ScreenOrientation]

	
			//alert(window.innerWidth);
			
			//note: CHANGE in orientation
			if (iCurrentAppleWebKitInnerWidth!=window.innerWidth) {
				iCurrentAppleWebKitInnerWidth=window.innerWidth;
/*				
				screen.width=iCurrentAppleWebKitInnerWidth;
				alert(screen.width);
*/				
				iAppleWebKitInnerWidthOffset=iCurrentAppleWebKitInnerWidth-screen.width;
				
				if (iAppleWebKitInnerWidthOffset<0) {
					iAppleWebKitInnerWidthOffset*=(-1);
				}
			}
			
		}
		else {			
			//added by Mike, 20221002
			iVerticalOffset=(iStageMaxHeight+(screen.height/1.5-iStageMaxHeight));
			
			//alert(screen.orientation); //OUTPUT: [object ScreenOrientation]

			if (window.matchMedia("(orientation: landscape)").matches) {
				//note: for CONTROLLER BUTTONS
				iVerticalOffset=(screen.height-buttonUpKey.clientHeight*3); //set to 3 button height from the bottom
			}				
		}
	
		
		buttonUpKey.style.left = (0)+iButtonWidth*1+"px";
		buttonUpKey.style.top =  iVerticalOffset+"px"; //iStageMaxHeight+"px";
		buttonUpKey.style.visibility = "visible";
		
		buttonLeftKey.style.left = (0)+"px";
		buttonLeftKey.style.top =  iVerticalOffset+iButtonHeight*1+"px"; //iStageMaxHeight+iButtonHeight*1+"px";
		buttonLeftKey.style.visibility = "visible";

		//added by Mike, 20221019
		buttonLeverCenterNeutralKey.style.left = (0)+iButtonWidth*1+"px";
		buttonLeverCenterNeutralKey.style.top =  iVerticalOffset+iButtonHeight*1+"px"; 
		buttonLeverCenterNeutralKey.style.visibility = "visible";

		buttonRightKey.style.left = (0)+iButtonWidth*2+"px";
		buttonRightKey.style.top =  iVerticalOffset+iButtonHeight*1+"px";//iStageMaxHeight+iButtonHeight*1+"px";
		buttonRightKey.style.visibility = "visible";

		buttonDownKey.style.left = (0)+iButtonWidth*1+"px";
		buttonDownKey.style.top =  iVerticalOffset+iButtonHeight*2+"px"; //iStageMaxHeight+iButtonHeight*2+"px";
		buttonDownKey.style.visibility = "visible";

		
		//added by Mike, 20221021
		buttonLetterIKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth*2+"px";
		buttonLetterIKey.style.top =  iVerticalOffset+"px"; //iStageMaxHeight+"px";
		buttonLetterIKey.style.visibility = "visible";
		
		buttonLetterJKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth*3+"px";
		buttonLetterJKey.style.top =  iVerticalOffset+iButtonHeight*1+"px"; //iStageMaxHeight+iButtonHeight*1+"px";
		buttonLetterJKey.style.visibility = "visible";

		//added by Mike, 20221019
		buttonRightLeverCenterNeutralKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth*2+"px";
		buttonRightLeverCenterNeutralKey.style.top =  iVerticalOffset+iButtonHeight*1+"px"; 
		buttonRightLeverCenterNeutralKey.style.visibility = "visible";

		buttonLetterLKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth+"px";
		buttonLetterLKey.style.top =  iVerticalOffset+iButtonHeight*1+"px";//iStageMaxHeight+iButtonHeight*1+"px";
		buttonLetterLKey.style.visibility = "visible";

		buttonLetterKKey.style.left = iAppleWebKitInnerWidthOffset+(screen.width)-iButtonWidth*2+"px";
		buttonLetterKKey.style.top =  iVerticalOffset+iButtonHeight*2+"px"; //iStageMaxHeight+iButtonHeight*2+"px";
		buttonLetterKKey.style.visibility = "visible";
	}

						
	//added by Mike, 20221111
	if (!bIsInitAutoGeneratePuzzleFromEnd) {	
		autoVerifyPuzzleIfAtEnd();			
	}
	//added by Mike, 20221120
	//if (!bIsInitAutoGeneratePuzzleFromEnd) {
	else {		
		//TO-DO: -add: auto-generating...
	
		buttonLeftKey.style.visibility="hidden";
		buttonRightKey.style.visibility="hidden";
		buttonUpKey.style.visibility="hidden";
		buttonDownKey.style.visibility="hidden";

		buttonLeverCenterNeutralKey.style.visibility="hidden";

		buttonLetterJKey.style.visibility="hidden";
		buttonLetterLKey.style.visibility="hidden";
		buttonLetterIKey.style.visibility="hidden";
		buttonLetterKKey.style.visibility="hidden";

		buttonRightLeverCenterNeutralKey.style.visibility="hidden";
	}
	
	//edited by Mike, 20221113; 20221112
	autoUpdatePuzzleTileImage();
}

//added by Mike, 20220904
//version 2; with offset, et cetera
//@return bool
function isIntersectingRect(mdo1, mdo2) {
	
	//added by Mike, 20221120 
	//note#1: mdo1=humanTile;
	//note#2: mdo2=monsterTile;
	
	let mdo1XPos = mdo1.getBoundingClientRect().x;
	let mdo1YPos = mdo1.getBoundingClientRect().y;			

/* //edited by Mike, 20221120
	let mdo1Width = 64;
	let mdo1Height = 64; 
*/
	let mdo1Width = 32;
	let mdo1Height = 32; 
	
	let mdo2XPos = mdo2.getBoundingClientRect().x;
	let mdo2YPos = mdo2.getBoundingClientRect().y;			
	let mdo2Width = 64; //mdo2.getBoundingClientRect().width;
	let mdo2Height = 64; //mdo2.getBoundingClientRect().height;		
	
	//edited by Mike, 20221120
	//note: before HUMAN reaches MONSTER
	let iOffsetXPosAsPixel=-20; //0; //10;
	let iOffsetYPosAsPixel=-20; //0; //10;	
	
	//added by Mike, 20221121
	if (bIsMonsterExecutingAttack) {
		iOffsetXPosAsPixel=0; //0; //10;
		iOffsetYPosAsPixel=0; //0; //10;	
	}


/*	//edited by Mike, 20221120
	let iStepX=10;
	let iStepY=10;	
*/
	let iStepX=2;
	let iStepY=2;	


/*	
	alert("mdo1XPos: "+mdo1XPos+"; "+"mdo1Width: "+mdo1Width);	
	alert("mdo2XPos: "+mdo2XPos+"; "+"mdo2Width: "+mdo2Width);
*/
	
	if ((mdo2YPos+mdo2Height < mdo1YPos+iOffsetYPosAsPixel-iStepY) || //is the bottom of mdo2 above the top of mdo1?
		(mdo2YPos > mdo1YPos+mdo1Height-iOffsetYPosAsPixel+iStepY) || //is the top of mdo2 below the bottom of mdo1?
		(mdo2XPos+mdo2Width < mdo1XPos+iOffsetXPosAsPixel-iStepX) || //is the right of mdo2 to the left of mdo1?
		(mdo2XPos > mdo1XPos+mdo1Width-iOffsetXPosAsPixel+iStepX)) //is the left of mdo2 to the right of mdo1?
	{		
		//no collision
		return false;
	}
	
	return true;
}


//added by Mike, 20221120
//@return bool
function isPointIntersectingRect(iXPos, iYPos, mdo2) {
	
	//added by Mike, 20221120 
	//note#1: mdo1=humanTile;
	//note#2: mdo2=monsterTile;
/* //removed by Mike, 20221120	
	let mdo1XPos = mdo1.getBoundingClientRect().x;
	let mdo1YPos = mdo1.getBoundingClientRect().y;			

	let mdo1Width = 32;
	let mdo1Height = 32; 
*/

	let mdo1XPos = iXPos;
	let mdo1YPos = iYPos;				
	let mdo1Width = 32;
	let mdo1Height = 32; 
	
//	alert(mdo1XPos);
		
	let mdo2XPos = mdo2.getBoundingClientRect().x;
	let mdo2YPos = mdo2.getBoundingClientRect().y;			
	let mdo2Width = 64; //mdo2.getBoundingClientRect().width;
	let mdo2Height = 64; //mdo2.getBoundingClientRect().height;		

//	alert(mdo2XPos);

	//edited by Mike, 20221120
	//note: before HUMAN reaches MONSTER
	let iOffsetXPosAsPixel=0; //-20; //0; //10;
	let iOffsetYPosAsPixel=0; //-20; //0; //10;	

/*	//edited by Mike, 20221120
	let iStepX=10;
	let iStepY=10;	
*/
	let iStepX=2;
	let iStepY=2;	

/*	
	alert("mdo1XPos: "+mdo1XPos+"; "+"mdo1Width: "+mdo1Width);	
	alert("mdo2XPos: "+mdo2XPos+"; "+"mdo2Width: "+mdo2Width);
*/

/*	
	alert("mdo1YPos: "+mdo1YPos+"; "+"mdo1Height: "+mdo1Height);	
	alert("mdo2YPos: "+mdo2YPos+"; "+"mdo2Height: "+mdo2Height);
*/
	
	if ((mdo2YPos+mdo2Height < mdo1YPos+iOffsetYPosAsPixel-iStepY) || //is the bottom of mdo2 above the top of mdo1?
		(mdo2YPos > mdo1YPos+mdo1Height-iOffsetYPosAsPixel+iStepY) || //is the top of mdo2 below the bottom of mdo1?
		(mdo2XPos+mdo2Width < mdo1XPos+iOffsetXPosAsPixel-iStepX) || //is the right of mdo2 to the left of mdo1?
		(mdo2XPos > mdo1XPos+mdo1Width-iOffsetXPosAsPixel+iStepX)) //is the left of mdo2 to the right of mdo1?
	{		
		//no collision
		return false;
	}
	
	return true;
}

//every 5secs
//setInterval(myUpdateFunction, 5000);
//edited by Mike, 20220822; increase world's repaint speed;
//add: delay in object's repaint speed
//setInterval(myUpdateFunction, 100); //200); //1/5 of second

//remembered: from https://www.youtube.com/watch?v=SxAFLXSeMjI; last accessed: 20220827; keyphrase: 桜井政博のゲーム作るには, フレームはコマ数

//added by Mike, 20220904
//notes: executes faster than onLoad() before init of positions, et cetera
//removed by Mike, 20220904
/*setInterval(myUpdateFunction, 16.66); //1000/60=16.66; 60 frames per second
*/

//setInterval(myUpdateFunction, 33.33); //1000/30=33.33; 30 frames per second
//output: via Android Samsung Duos, noticeable delay in frame update

//setInterval(myUpdateFunction, 100); //1/5/2 of second
//setInterval(myUpdateFunction, 50); //200); //1/5 of second

//verified: internet connectivity to successfully load page;
//OUTPUT: 60 frames per second execution appears to be CORRECT

//TO-DO: -verify: setting image tile to be smaller than 64x64px
//reference: https://invertedhat.itch.io/postie; last accessed: 20220825;
//however, NOT as RUN&JUMP ACTION GAME; 
//where: OUTPUT via CONTROLS noticeably INCORRECT 
//to cause multiple attempts to execute correct JUMP to platform;

//reference: https://stackoverflow.com/questions/15466802/how-can-i-auto-hide-alert-box-after-it-showing-it; last accessed: 20220911
//answer by: Travis J, 20130317T2213
function tempAlert(msg,duration)
{
 var el = document.createElement("div");
  
  //edited by Mike, 20220911 //el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;");

  el.setAttribute("style","position:absolute;top:0%;left:0%;background-color:white;");
  el.innerHTML = msg;
   
  setTimeout(function(){
    el.parentNode.removeChild(el);
 	  
	//added by Mike, 20220914; edited by Mike, 20220925
	//--------------------------------------------

	//added by Mike, 20220926
	//TO-DO: -update: to identify offset container for INNER SCREEN, CONTROLLER
	var iHorizontalOffsetPrev = iHorizontalOffset;
	
	//TO-DO: -reverify: this; added by Mike, 20221119
	iHorizontalOffset=(screen.width)/2-iStageMaxWidth/2;

	//added by Mike, 20221119
	//error caused by pinch zoom via SAFARI on iPAD
	//added: in CSS's html and body, touch-action: none;
	if (bIsUsingAppleWebKit) {
		if (screen.width!=screen.innerWidth) {
			iHorizontalOffset=(screen.innerWidth)/2-iStageMaxWidth/2;
		}		
	}


	//added by Mike, 20220925	
	//iVerticalOffset=iStageMaxHeight+((screen.height-iStageMaxHeight)/2);
	iVerticalOffset=(iStageMaxHeight+(screen.height/1.5-iStageMaxHeight));	
	
	//alert("screen.width: "+screen.width); //landscape:533; potrait: 320
	//alert("iStageMaxWidth: "+iStageMaxWidth); //landscape:320; potrait: 320

	//alert("screen.height: "+screen.height); //landscape:533; potrait: 320

	//added by Mike, 20220926
	//TO-DO: -add: auto-update for all moving objects, et cetera	
	var humanTile = document.getElementById("humanTileImageId");

	let humanTileX = humanTile.getBoundingClientRect().x;
	
	humanTile.style.left =  iHorizontalOffset + (humanTileX-iHorizontalOffsetPrev)+"px";
	//humanTile.style.left =  iHorizontalOffset + humanTileX+"px";

	//alert(humanTile.style.left);
	
	//added by Mike, 20221006
	var pauseLink = document.getElementById("pauseLinkId");
	var iPauseLinkHeight = (pauseLink.clientHeight);//+1; + "px";
	var iPauseLinkWidth = (pauseLink.clientWidth);//+1; + "px"

	//edited by Mike, 20221012
	//note: screen set to custom-ZOOM causes INCORRECT POSITION OUTPUT
	//TO-DO: -verify: auto-set ZOOM to be 100%
	pauseLink.style.left = 0+iHorizontalOffset+iStageMaxWidth/2 -iPauseLinkWidth/2 +"px";
//	pauseLink.style.left = 0+screen.width/2-iPauseLinkWidth/2 +"px";

	//edited by Mike, 20221007
	//pauseLink.style.top = 0+iStageMaxHeight/2 +"px"; 
	pauseLink.style.top = 0+iStageMaxHeight +"px"; 
	
	//notes: noticeable delay in CHANGE in position via repaint setting, et cetera	
	myUpdateFunction();
	//--------------------------------------------
	
  },duration);
  
  document.body.appendChild(el);
}

//TO-DO: -add: receive input on touch @button position;
//--> due to: touch slide from key D (right) to key A (left),
//--> does NOT cause key A button press; INCORRECT OUTPUT

//edited by Mike, 20221030
//function keyPressDown(iKey) {
function keyPressDown(iKey, event) {	
	//added again by Mike, 20221106; from 20221101
	//note: verify before left-side buttons
	for (iCount=iDirectionTotalKeyCount; iCount<iTotalKeyCount; iCount++) {
		arrayKeyPressed[iKey]=true;		
	}

	//edited by Mike, 20221030
	//arrayKeyPressed[iKey]=true;
	
	iEventChangedTouchCount = event.changedTouches.length;
					
	for (iCount=0; iCount<iEventChangedTouchCount; iCount++) {		
		if (event.changedTouches[iCount].screenX<screen.width/2) {
		}
		else {
			return;
		}
		
		//edited by Mike, 20221106
		//for (iCount=0; iCount<iDirectionTotalKeyCount; iCount++) {
		for (iCount=0; iCount<iTotalKeyCount; iCount++) {
			arrayKeyPressed[iCount]=false;
		}		
	
		arrayKeyPressed[iKey]=true;		
	}	

	iNoKeyPressCount=0;	
}

//edited by Mike, 20220918
//reverified: to be OK, onMouseUp with onMouseDown
//edited by Mike, 20221030
//function keyPressUp(iKey) {
function keyPressUp(iKey, event) {

//alert("RELEASE");

	//edited by Mike, 20221030
	arrayKeyPressed[iKey]=false;
	
	//added by Mike, 20221117
	bIsWalkingAction=false;
}

//added by Mike, 20221029
//reference: https://stackoverflow.com/questions/62823062/adding-a-simple-left-right-swipe-gesture/62825217#62825217;
//answer by: smmehrab, 20200709T2330; edited 20200711T0355
function handleGesture() {
	//added by Mike, 20221030; edited by Mike, 20221108
//	if (document.fullscreenElement) {
	//edited by Mike, 20221109
//	if ((document.fullscreenElement) || (bIsUsingAppleWebKit)){
	if ((document.fullscreenElement) && (!bIsUsingAppleMac)){
		if (iTouchEndX < iTouchStartX) {
			//console.log('Swiped Left');
			//alert("Swiped Left");
			arrayKeyPressed[iKEY_D]=false;		
			arrayKeyPressed[iKEY_A]=true;		
		}

		if (iTouchEndX > iTouchStartX) {
			//console.log('Swiped Right');
			//alert("Swiped Right");
			arrayKeyPressed[iKEY_D]=true;		
			arrayKeyPressed[iKEY_A]=false;		
		}

		if (iTouchEndY < iTouchStartY) {
			//console.log('Swiped Up');
//			alert("Swiped Up");
			arrayKeyPressed[iKEY_W]=true;		
			arrayKeyPressed[iKEY_S]=false;		
		}

		if (iTouchEndY > iTouchStartY) {
			//console.log('Swiped Down');
//			alert("Swiped Down");
			arrayKeyPressed[iKEY_W]=false;		
			arrayKeyPressed[iKEY_S]=true;		
		}

		if (iTouchEndY === iTouchStartY) {
	//        console.log('Tap');
//			alert("Tap");
			arrayKeyPressed[iKEY_D]=false;		
			arrayKeyPressed[iKEY_A]=false;	

			arrayKeyPressed[iKEY_W]=false;		
			arrayKeyPressed[iKEY_S]=false;
		}
	}
}

//added by Mike, 20221113
function initPuzzleTileTextValueContainer() {
	iTileBgCount=0;

	for (iRowCount=0; iRowCount<iRowCountMax; iRowCount++) {
		for (iColumnCount=0; iColumnCount<iColumnCountMax; iColumnCount++) {
			//alert(arrayPuzzleTileCountId[iTileBgCount].alt);
//			arrayPuzzleTileCountId[iTileBgCount].alt=(iTileBgCount+1)+"";		

			if (iTileBgCount==iTileBgCountMax-1) {
//alert(iTileBgCount);
				arrayPuzzleTileCountId[iTileBgCount].alt=""; //space
				
				//added by Mike, 20221106
				arrayPuzzleTileCountId[iTileBgCount].className="Image32x32TileSpace";		

				bIsTargetAtSpace=true;
			}
			else {
				arrayPuzzleTileCountId[iTileBgCount].className="Image32x32Tile";
			}
			
			iTileBgCount++;
		}
	}
}

//added by Mike, 20220822
function onLoad() {
	//added by Mike, 2022113
	//keyphrase: identify machine and computer browser

	//added by Mike, 20221108
//	alert(navigator.userAgent);

	//added by Mike, 20220910
	//reference: https://stackoverflow.com/questions/6666907/how-to-detect-a-mobile-device-with-javascript; last accessed: 20220910
	//answer by: Baraa, 20141026T2059
	//edited by Mike, 20221108
//	if (/Mobile|Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
	if (/Mobile|Android|webOS|iPhone|iPad|iPod|AppleWebKit|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {

//		alert("detected: Mobile Browser!");
		
		//added by Mike, 20220925
		bIsMobile=true;
		
		//added by Mike, 20221108
		if (navigator.userAgent.includes("AppleWebKit")) {
			bIsUsingAppleWebKit=true;
			//added by Mike, 20221109
			bIsUsingAppleMac=false; //default
		}
		
		//added by Mike, 20221113
		//notes: "AppleWebKit" to exist even with "Android"
		if (navigator.userAgent.includes("Android")) {
			bIsUsingAppleWebKit=false;
		}		

		//added by Mike, 20221113
		//example: Linux x86_64 (desktop)
		if (navigator.userAgent.includes("Linux x")) {		
			bIsMobile=false;
		}		

		//note: iPAD and MacBookPro OS : Mac OS X
		//adds: to be re-classified as iPAD via TOUCH command
		if ((navigator.userAgent.includes("Macintosh")) || navigator.userAgent.includes("Mac")) {
			bIsUsingAppleMac=true;
		}		
	}
	
	//added by Mike, 20221106
	iTileBgCount=0;

	for (iRowCount=0; iRowCount<iRowCountMax; iRowCount++) {		
		for (iColumnCount=0; iColumnCount<iColumnCountMax; iColumnCount++) {

		//alert(iTileBgCount);
			arrayPuzzleTilePos[iRowCount][iColumnCount]=iTileBgCount;

			arrayPuzzleTileCountId[iTileBgCount] = document.getElementById("puzzleTileImageIdBg"+iTileBgCount);

			arrayPuzzleTileCountId[iTileBgCount].style.visibility="hidden";
			
				//added by Mike, 20221106
				//reference: https://www.w3schools.com/tags/tag_img.asp;
				//last accessed: 20221105
				//count			
				//edited by Mike, 20221106				//arrayPuzzleTileCountId[iTileBgCount].alt=(iTileBgCount+1)+"";

				arrayPuzzleTileCountId[iTileBgCount].alt=(iTileBgCount+1)+"";
				
				//added by Mike, 20221106
				arrayPuzzleTileCountId[iTileBgCount].className="Image32x32Tile";	
		
			iTileBgCount++;
		}
	}

	
	//reference: https://stackoverflow.com/questions/4917664/detect-viewport-orientation-if-orientation-is-portrait-display-alert-message-ad; last accessed: 20220910
	//answer by: Jatin, 20120731T0711;
	//edited by Tisho, 20120731T0730
	//add: listener to detect orientation change
	window.addEventListener("orientationchange", function() {
	  //orientation number (in degrees) : 90 and -90 for landscape; 0 for portrait
	  //edited by Mike, 20220911
	  //alert(window.orientation);
			
		//added by Mike, 20220910; edited by Mike, 20220911	
		var myBody = document.getElementById("myBodyId");

		//reference: https://stackoverflow.com/questions/4917664/detect-viewport-orientation-if-orientation-is-portrait-display-alert-message-ad; last accessed: 20220910
		//answer by: crmpicco, 20130515T1414;
		//edited by: posit labs, 20150929T1708
		//if ((window.orientation==0) ||
/*		
		if ((screen.orientation==0) ||
			(window.matchMedia("(orientation: portrait)").matches)) {
*/				
		if (screen.orientation==0) {
		  //alert("detected: PORTRAIT mode");
		   myBody.className='bodyPortraitMode';
		}
		else {//if (window.matchMedia("(orientation: landscape)").matches) {
		   //alert("detected: LANDSCAPE mode");	   	   
		   myBody.className='bodyLandscapeMode';
		}			  

		//tempAlert("close",1000);　//1sec
		//edited by Mike, 20220914
		//tempAlert("",1000);　//1sec
		tempAlert("",200);　//1/5sec		
				
		//TO-DO: -add: auto-update: object positions after CHANGE in orientation 
	}, false);

	//added by Mike, 20221118
	imgPuzzle = document.getElementById("puzzleImageId");


	//added by Mike, 20220904	
	//TO-DO: -add: init; where: set initial positions, et cetera
	var monsterTile = document.getElementById("monsterTileImageId");
	monsterTile.style.left = screen.width/2 +"px"; //"100px";
	monsterTile.style.top = "0px"; //"100px";

	//edited by Mike, 20221120; from 20221118
	monsterTile.style.visibility="hidden"; //visible
	//monsterTile.style.visibility="visible";
	
/* //removed by Mike, 20221115	
	//added by Mike, 20220911
	//TO-DO: -update: computer instructions to reuse containers, e.g. stage width
	var humanTile = document.getElementById("humanTileImageId");
	//edited by Mike, 20220925
	humanTile.style.left = screen.width/2 +"px"; //"100px";
//	humanTile.style.left = iHorizontalOffset +"px"; //"100px";

	//edited by Mike, 20220911; edited again by Mike, 20220925
	humanTile.style.top = screen.height/4 +"px"; //screen.height/2 +"px"; //"100px";
//	humanTile.style.top = iVerticalOffset +"px"; //screen.height/2 +"px"; //"100px";

	//added by Mike, 20221002
	humanTile.style.visibility="visible";
*/

	//note: smaller screen width x height for game canvas;
	//as with Legend of Zelda Game&Watch; landscape view
	//IF identified to be mobile,
	//remaining space, for touch button inputs;
	//IF keyboard inputs: W, S, A, D, et cetera

	document.body.onkeydown = function(e){
	//alert("e.keyCode: "+e.keyCode);
		
		//added by Mike, 20221108; edited by Mike, 20221115
		switch (iCurrentMiniGame) {
			case MINI_GAME_PUZZLE:
				if (bIsInitAutoGeneratePuzzleFromEnd) {
					return;
				}		
				break;
			case MINI_GAME_ACTION:
				break;						
		}
		
		
/* //removed by Mike, 20220823		
		var humanTile = document.getElementById("humanTileImageId");

		//added by Mike, 20220821; OK
		//note: myUpdateFunction() executes only 
		//when Web Browser is set to be FOCUSED;
		let humanTileX = humanTile.getBoundingClientRect().x;
		//added by Mike, 20220822
		let humanTileY = humanTile.getBoundingClientRect().y;
			
		let iStepX=4;
		let iStepY=4;
*/
		//note: simultaneous keypresses now OK;
				
				
//added by Mike, 20221029; removed by Mike, 20221029;
//still incorrect output; quick sequence from top to left button, output error
/*
			arrayKeyPressed[iKEY_D]=false;			
			arrayKeyPressed[iKEY_A]=false;			
			arrayKeyPressed[iKEY_W]=false;			
			arrayKeyPressed[iKEY_S]=false;		
*/			
				
		//OK; //note: unicode keycode, where: key d : 100?
		//note: auto-accepts keyhold; however, with noticeable delay 
		//solved: via bKeyDownRight = false; et cetera
		if (e.keyCode==68) { //key d
	//			alert("dito");
			//humanTile.style.left =  humanTileX+iStepX+"px";				
			//edited by Mike, 20220823
			//bKeyDownRight=true;
			arrayKeyPressed[iKEY_D]=true;			
		}
		else if (e.keyCode==65) { //key a			
			//edited by Mike, 20220823
			//humanTile.style.left =  humanTileX-iStepX+"px";				
			arrayKeyPressed[iKEY_A]=true;			
		}
		
		//added by Mike, 20220822
		if (e.keyCode==87) { //key w		
			//edited by Mike, 20220823
			//humanTile.style.top =  humanTileY-iStepY+"px";				
			arrayKeyPressed[iKEY_W]=true;			
		}
		else if (e.keyCode==83) { //key s
			//edited by Mike, 20220823
			//humanTile.style.top =  humanTileY+iStepY+"px";				
			arrayKeyPressed[iKEY_S]=true;			
		}

		//added by Mike, 20221101		
		//notes: RIGHT-SIDE BUTTONS to already accept 
		//both capital and small letters

		//RIGHT-SIDE BUTTONS
		if (e.keyCode==73) { //key i
			arrayKeyPressed[iKEY_I]=true;			
		}
		else if (e.keyCode==75) { //key k			
			arrayKeyPressed[iKEY_K]=true;			
		}
		
		if (e.keyCode==74) { //key j		
			arrayKeyPressed[iKEY_J]=true;			
		}
		else if (e.keyCode==76) { //key l
			arrayKeyPressed[iKEY_L]=true;			
		}		
	}

	//added by Mike, 20220822
	document.body.onkeyup = function(e){
		//alert("KEYUP; e.keyCode: "+e.keyCode);
		if (e.keyCode==68) { //key d
			//edited by Mike, 20220823
			//bKeyDownRight=false;
			arrayKeyPressed[iKEY_D]=false;			
		}
		else if (e.keyCode==65) { //key a			
			arrayKeyPressed[iKEY_A]=false;			
		}

		//added by Mike, 20220823
		if (e.keyCode==87) { //key w			
			arrayKeyPressed[iKEY_W]=false;			
		}
		else if (e.keyCode==83) { //key s			
			arrayKeyPressed[iKEY_S]=false;			
		}
		
		//added by Mike, 20221101
		//RIGHT-SIDE BUTTONS
		if (e.keyCode==73) { //key i
			arrayKeyPressed[iKEY_I]=false;		
			
//			alert("HALLO");			
		}
		else if (e.keyCode==75) { //key k			
			arrayKeyPressed[iKEY_K]=false;			
		}
		
		if (e.keyCode==74) { //key j		
			arrayKeyPressed[iKEY_J]=false;			
		}
		else if (e.keyCode==76) { //key l
			arrayKeyPressed[iKEY_L]=false;			
		}
		
	}	
	
	//added by Mike, 20221110
	//reference: https://stackoverflow.com/questions/70827887/detect-click-vs-touch-in-javascript;
	//last accessed: 20221110
	//answer by:  Jacob, 20220124T0110
	document.body.addEventListener('pointerdown', (event) => {
	  if (event.pointerType === "mouse") {
		  //alert("MOUSE");
		  if (bIsUsingAppleWebKit) {
			bIsUsingAppleMac=true;
		  }
	  }
	  if (event.pointerType === "touch") {
		  //alert("TOUCH");		  
		  if (bIsUsingAppleWebKit) {
			//added by Mike, 20221111; removed by Mike, 20221118
			//note: NOT yet set
			if (bIsUsingAppleMac) {
				toggleFullScreen();
			}

			bIsUsingAppleMac=false;
			bIsMobile=true; //added by Mike, 20221110			
		  }
	  }
/*	//removed by Mike, 20221110	  
	  if (event.pointerType === "pen") {		  
	  }
*/	  

		//added by Mike, 20221120
		if (iCurrentMiniGame==MINI_GAME_PUZZLE) {			
			var monsterTile = document.getElementById("monsterTileImageId");
			var iXPos = event.screenX;
			//note: screenY includes BROWSER address bar, et cetera;
			var iYPos = event.pageY; //screenY;

			//alert(iXPos);
			//alert(isPointIntersectingRect(iXPos, iYPos, monsterTile));
			
			if (isPointIntersectingRect(iXPos, iYPos, monsterTile)) {
				changeMiniGame(MINI_GAME_ACTION);
			}
		}

	});

	
	//added by Mike, 20221101
	//TO-DO: -re-verify: using array container
	//--> with iTouchStartX, iTouchEndX
		
	//added by Mike, 20221029
	//reference: https://stackoverflow.com/questions/62823062/adding-a-simple-left-right-swipe-gesture/62825217#62825217;
	//answer by: smmehrab, 20200709T2330; edited 20200711T0355
	document.body.addEventListener('touchstart', function (event) {
		iEventChangedTouchCount = event.changedTouches.length;
		
		for (iCount=0; iCount<iEventChangedTouchCount; iCount++) {		
			if (event.changedTouches[iCount].screenX<screen.width/2) {
			}
			else {
				return;
			}
		
		//alert("hallo");
		
/*		
			iTouchStartX = event.changedTouches[0].screenX;
			iTouchStartY = event.changedTouches[0].screenY;		
*/
			iTouchStartX = event.changedTouches[iCount].screenX;
			iTouchStartY = event.changedTouches[iCount].screenY;		

			//alert("iTouchStartX: "+iTouchStartX);
			
			//added by Mike, 20221030
			iTouchStartCount=0;
		}

	}, false);

	document.body.addEventListener('touchend', function (event) {
		iEventChangedTouchCount = event.changedTouches.length;
		
		for (iCount=0; iCount<iEventChangedTouchCount; iCount++) {		
			if (event.changedTouches[iCount].screenX<screen.width/2) {
			}
			else {
				return;
			}
/*
			iTouchEndX = event.changedTouches[0].screenX;
			iTouchEndY = event.changedTouches[0].screenY;
*/
			iTouchEndX = event.changedTouches[iCount].screenX;
			iTouchEndY = event.changedTouches[iCount].screenY;

			//alert("iTouchEndX: "+iTouchEndX);

			handleGesture();
		}
	}, false);
	
			
	//added by Mike, 20221030
	//note: keyPress, keyRelease
	//adds: keyphrase: RELAX (with TOUCH inputs), 
	//--> not excessively fast ACTION; 
	//swipe command received as input @most one (1) time only;
	//afterwards, shall need keyReleased, i.e. keyUP;
	document.body.addEventListener('touchmove', function (event) {
		//alert(event.changedTouches.length);
		
		iEventChangedTouchCount = event.changedTouches.length;
		
		for (iCount=0; iCount<iEventChangedTouchCount; iCount++) {		
			if (event.changedTouches[iCount].screenX<screen.width/2) {
			}
			else {
				return;
			}
		
//			if (event.changedTouches[0]) {
//			if (iCount==0) {
			//if (true) {
		
			//added by Mike, 20221030
			iPrevTouchStartX=iTouchStartX;
			iPrevTouchStartY=iTouchStartY;

/*
			iTouchStartX = event.changedTouches[0].screenX;
			iTouchStartY = event.changedTouches[0].screenY;		
*/
			iTouchStartX = event.changedTouches[iCount].screenX;
			iTouchStartY = event.changedTouches[iCount].screenY;		

			//alert("iTouchStartX: "+iTouchStartX);

			//alert("iTouchStartY: "+iTouchStartY);

			
			//added by Mike, 20221030; removed by Mike, 20221030
			//iTouchStartCount=0;

	/*
			if ((iTouchStartX!=iPrevTouchStartX) ||
				(iTouchStartY!=iPrevTouchStartY)) {
	*/
			
			//added by Mike, 20221031
			var buttonRightKey = document.getElementById("rightKeyId");
			var buttonUpKey = document.getElementById("upKeyId");

			var iButtonWidth = buttonRightKey.getBoundingClientRect().width;
			var iButtonHeight = buttonUpKey.getBoundingClientRect().height;
			
	
			//swiped left
			if (iTouchStartX<iPrevTouchStartX) {				
	//				alert("dito");
	/*			//movement stopped
				iTouchEndX=iTouchStartX;
				iTouchEndY=iTouchStartY;
	*/

				//if initial movement to RIGHT
				//and swiped to LEFT (opposite direction)
				if (arrayKeyPressed[iKEY_D]) {
					
					iTouchEndX=iTouchStartX;
//					iTouchEndY=iTouchStartY;

					iTouchStartX=iPrevTouchStartX;
//					iTouchStartY=iPrevTouchStartY;
					
					//added by Mike, 20221031
					//swiped to LEFT					
					//distance get in x-axis
					//alert(iTouchStartX-iTouchEndX);
					
					iDistanceXAxis=iTouchStartX-iTouchEndX;					
//					iDistanceXAxis=iTouchEndX-iTouchStartX;					

					//iButtonWidth = buttonUpKey.getBoundingClientRect().width;

					//TO-DO: reverify: CAUSE iButtonWidth/5
//					if (iDistanceXAxis<=iButtonWidth/5) {
					if (iDistanceXAxis<=iButtonWidth/6) {
						arrayKeyPressed[iKEY_A]=false;
						arrayKeyPressed[iKEY_D]=false;	
/*
alert("iDistanceXAxis"+iDistanceXAxis);			
alert("iButtonWidth"+iButtonWidth);			
*/
			
					}
					else {						
						arrayKeyPressed[iKEY_A]=true;
						arrayKeyPressed[iKEY_D]=false;

						iTouchStartCount=0;			
					}

/* //removed by Mike, 20221031
					arrayKeyPressed[iKEY_A]=true;
					arrayKeyPressed[iKEY_D]=false;

					iTouchStartCount=0;			
*/
				}
			}
			//swiped right
			else if (iTouchStartX>iPrevTouchStartX) {				
				//if initial movement to LEFT
				//and swiped to RIGHT (opposite direction)
				if (arrayKeyPressed[iKEY_A]) {
					iTouchEndX=iTouchStartX;
//					iTouchEndY=iTouchStartY;

					iTouchStartX=iPrevTouchStartX;
//					iTouchStartY=iPrevTouchStartY;
					
					//handleGesture();

					//added by Mike, 20221031
					//swiped to RIGHT
					//distance get in x-axis
					//alert(iTouchStartX-iTouchEndX);
					
					iDistanceXAxis=iTouchEndX-iTouchStartX;					
					//iButtonWidth = buttonUpKey.getBoundingClientRect().width;

//					if (iDistanceXAxis<=iButtonWidth/5) {
					if (iDistanceXAxis<=iButtonWidth/6) {
						arrayKeyPressed[iKEY_A]=false;
						arrayKeyPressed[iKEY_D]=false;
					}
					else {
						arrayKeyPressed[iKEY_A]=false;
						arrayKeyPressed[iKEY_D]=true;

						iTouchStartCount=0;			
					}
				}
			}
			
			//added by Mike, 20221030
			//swiped up
			/*else*/ if (iTouchStartY < iPrevTouchStartY) {
								
				//if initial movement to DOWN
				//and swiped to UP (opposite direction)
				if (arrayKeyPressed[iKEY_S]) {
				
//					alert("dito");

				
//					iTouchEndX=iTouchStartX;
					iTouchEndY=iTouchStartY;

//					iTouchStartX=iPrevTouchStartX;
					iTouchStartY=iPrevTouchStartY;
					
/* //edited by Mike, 20221031					
					arrayKeyPressed[iKEY_W]=true;		
					arrayKeyPressed[iKEY_S]=false;		

					iTouchStartCount=0;			
*/

					//added by Mike, 20221031
					//swiped to UP
					//distance get in y-axis
					//alert(iTouchStartY-iTouchEndY);					
					iDistanceYAxis=iTouchStartY-iTouchEndY;					

					//iButtonWidth = buttonUpKey.getBoundingClientRect().width;

					//TO-DO: reverify: CAUSE iButtonHeight/5
//					if (iDistanceYAxis<=iButtonHeight/5) {
					if (iDistanceYAxis<=iButtonHeight/6) {
						arrayKeyPressed[iKEY_W]=false;		
						arrayKeyPressed[iKEY_S]=false;		
/*
alert("iDistanceYAxis"+iDistanceYAxis);			
alert("iButtonHeight"+iButtonHeight);			
*/
			
					}
					else {						
						arrayKeyPressed[iKEY_W]=true;		
						arrayKeyPressed[iKEY_S]=false;		

						iTouchStartCount=0;			
					}
				}
			}
			//swiped down
			else if (iTouchStartY > iPrevTouchStartY) {
				//if initial movement to UP
				//and swiped to DOWN (opposite direction)
				if (arrayKeyPressed[iKEY_W]) {
//					iTouchEndX=iTouchStartX;
					iTouchEndY=iTouchStartY;

//					iTouchStartX=iPrevTouchStartX;
					iTouchStartY=iPrevTouchStartY;


					//added by Mike, 20221031
					//swiped to DOWN
					//distance get in y-axis
					//alert(iTouchStartY-iTouchEndY);					
					iDistanceYAxis=iTouchEndY-iTouchStartY;					

//alert(iButtonHeight);

					//TO-DO: reverify: CAUSE iButtonHeight/5
//					if (iDistanceYAxis<=iButtonHeight/5) {
					if (iDistanceYAxis<=iButtonHeight/6) {
						arrayKeyPressed[iKEY_W]=false;		
						arrayKeyPressed[iKEY_S]=false;		
					}
					else {						
						arrayKeyPressed[iKEY_W]=false;		
						arrayKeyPressed[iKEY_S]=true;		

						iTouchStartCount=0;			
					}
				}
			}			
			
		}
//		}

	}, false);
	
	//added by Mike, 20221108; edited by Mike, 20221111
	bIsInitAutoGeneratePuzzleFromEnd=true;	
	//autoGeneratePuzzleFromEnd();

	//added by Mike, 20221113
	initPuzzleTileTextValueContainer();
		
			
	//added by Mike, 20220904
	setInterval(myUpdateFunction, 16.66); //1000/60=16.66; 60 frames per second
	
}		

	
	  </script>
  <!-- edited by Mike, 20220822 -->
  <body id="myBodyId" onload="onLoad();">

	<canvas id="myCanvasId" class="myCanvas">
	</canvas>
	


<!--
//reference: https://stackoverflow.com/questions/9454125/javascript-request-fullscreen-is-unreliable;
//last accessed: 20220825
//answer by: Sally Hammel, 20120409T1402
//edited by: BenMorel, 20131209T1511
-->
<!-- href="/flashStage"; href="#" //Full Screen Mode -->
<a id="pauseLinkId" class="pauseLink" onClick="toggleFullScreen()"><u>START</u></a>

<!-- edited by Mike, 20221119; from 20221105; mtPinatubo20150115T1415.jpg -->
	<img id="puzzleImageId" class="ImageBackgroundOfPuzzle" src="<?php echo base_url('assets/images/blank.png');?>">	

<?php 
	$iRowCountMax=4; 
	$iColumnCountMax=4; 	

	//16=4*4
	$iTileBgCountMax=$iRowCountMax*$iColumnCountMax;

for ($iCount=0; $iCount<$iTileBgCountMax; $iCount++) {
	//edited by Mike, 20221113; from 20221111
	//count.png
	//cambodia128x128-20141225T0958.jpg
	//cambodia512x512-20141225T0958.jpg
	//cambodia1024x1024-20141225T0958.jpg
	//count1024x1024.png
?>		
	<img id="puzzleTileImageIdBg<?php echo $iCount;?>" class="Image32x32Tile" onerror="" src="<?php echo base_url('assets/images/count.png');?>" alt="" title="">

<?php
}
?>
	<!-- added by Mike, 20221119 -->
	<div id="divPuzzleTileImageTargetBorderId" class="Image32x32TileTargetBorder"></div>

	<img id="humanTileImageId" class="Image32x32TileFrame1" src="<?php echo base_url('assets/images/human.png');?>">	
		
<!-- edited by Mike, 20221120; from 20221117; Image32x32TileFrame1 -->
	<img id="monsterTileImageId" class="Image64x64TileFrame1" src="<?php echo base_url('assets/images/monster.png');?>">	


<!-- removed by Mike, 20220911
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
-->	

<!-- edited by Mike, 20220918; 
	replaced: onClick COMMAND, with onMouseDown to be onMouseUp-->
<!--　//note: OUTPUT OK with computer browser with mouse
<a id="leftKeyId" class="controlKeyButtonAsLink" onMouseDown="leftKeyPressDown()" onMouseUp="leftKeyPressUp()"><|</a>
-->
<!--　//note: OUTPUT OK with Android touchscreen -->
<?php
	const iKEY_W = 0;
	const iKEY_S = 1;
	const iKEY_A = 2;
	const iKEY_D = 3;

	//added by Mike, 20221021
	const iKEY_I = 4;
	const iKEY_K = 5;
	const iKEY_J = 6;
	const iKEY_L = 7;

?>

<!-- //edited by Mike, 20220918
<button id="leftKeyId" class="controlKeyButton" ontouchstart="leftKeyPressDown()" ontouchend="leftKeyPressUp()"><|</button>
-->

<button id="upKeyId" class="controlKeyButtonUp" ontouchstart="keyPressDown(<?php echo iKEY_W;?>, event)" ontouchend="keyPressUp(<?php echo iKEY_W;?>, event)">AAA</button>
<button id="leftKeyId" class="controlKeyButtonLeft" ontouchstart="keyPressDown(<?php echo iKEY_A;?>, event)" ontouchend="keyPressUp(<?php echo iKEY_A;?>, event)">AAA</button>
<button id="rightKeyId" class="controlKeyButtonRight" ontouchstart="keyPressDown(<?php echo iKEY_D;?>, event)" ontouchend="keyPressUp(<?php echo iKEY_D;?>, event)">AAA</button>
<button id="downKeyId" class="controlKeyButtonDown" ontouchstart="keyPressDown(<?php echo iKEY_S;?>, event)" ontouchend="keyPressUp(<?php echo iKEY_S;?>, event)">AAA</button>

<!-- //added by Mike, 20221019 -->
<button id="leverCenterNeutralKeyId" class="controlKeyButtonLeverCenterNeutral">OOO</button>

<!-- //added by Mike, 20221021 -->
<button id="letterIKeyId" class="controlKeyButtonLetterI" ontouchstart="keyPressDown(<?php echo iKEY_I;?>, event)" ontouchend="keyPressUp(<?php echo iKEY_I;?>, event)">AAA</button>
<button id="letterJKeyId" class="controlKeyButtonLetterJ" ontouchstart="keyPressDown(<?php echo iKEY_J;?>, event)" ontouchend="keyPressUp(<?php echo iKEY_J;?>, event)">AAA</button>
<button id="letterLKeyId" class="controlKeyButtonLetterL" ontouchstart="keyPressDown(<?php echo iKEY_L;?>, event)" ontouchend="keyPressUp(<?php echo iKEY_L;?>, event)">AAA</button>
<button id="letterKKeyId" class="controlKeyButtonLetterK" ontouchstart="keyPressDown(<?php echo iKEY_K;?>, event)" ontouchend="keyPressUp(<?php echo iKEY_K;?>, event)">AAA</button>

<!-- //added by Mike, 20221019 -->
<button id="rightLeverCenterNeutralKeyId" class="controlKeyButtonRightLeverCenterNeutral">OOO</button>

<!-- //edited by Mike, 20221110
	//reference: https://stackoverflow.com/questions/12804028/safari-with-audio-tag-not-working; 
	//last accessed: 20221110
	//answer by: George Dimitriadis, 20171016T1500
	//edited by: 404 - Brain Not Found, 20221124T2110
	
	<audio id="myAudioId" class="myAudio" controls loop>
	  <source src="assets/audio/Tinig UsbongFlashReferenceDQ1GameboyColorLow64KBitsPerSec.mp3" type="audio/x-m4a">
	  Your browser does not support the audio tag.
	</audio><br/>	
	
	//edited by Mike, 20221119
	//Tinig UsbongFlashReferenceDQ1GameboyColorLow64KBitsPerSec.mp3
	//UsbongGameOff2022Action20221119T1213.mp3
	//audio/x-m4a
	//UsbongGameOff2022Puzzle20221119T1427.mp3
	//UsbongGameOff2022Action20221119T1911.mp3
	
	//note: put audio file in SERVER on CLOUD
-->
	<audio id="myAudioId" class="myAudio" src="assets/audio/UsbongGameOff2022Action20221119T1911.mp3" type="audio/x-m4a" controls loop>
	  Your browser does not support the audio tag.
	</audio><br/>	

  </body>
</html>
