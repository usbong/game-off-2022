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
' @date updated: 20220822; from 20220821
'
' Note: re-used computer instructions mainly from the following:
'	1) Usbong Knowledge Management System (KMS);
'	2) Usbong Flash;
-->
<?php

//TO-DO: -delete: excess instructions
//TO-DO: -use: image icons


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <style type="text/css">
	/**/
	                    body
                        {
                            font-family: Arial;
							font-size: 11pt;
								
							/* This makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							width: 670px								
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

						table, tr, td 
						{
							border-collapse: collapse;
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
						
						.Button-emptyStonePosCenter {
							padding: 10px;
							background-color: #ff0000;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
/*
							margin: 2px;
*/							
							margin: 0px;
						}

						.Button-emptyStonePosCenter:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCenter:focus {
							background-color: #b80000;
						}
						
						.Button-emptyStonePosCornerTopLeftPillar {
							padding: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
/*							
							margin-top: 2px;
							margin-left: 2px;
*/							

/*	edited by Mike, 20220429
							margin-top: -2px;
							margin-left: -2px;
							border-top: 2px solid;		
							border-left: 2px solid;		
*/							
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
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
/*
							margin-top: 0px;
							margin-left: 0px;
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
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
						
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
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
/*
							margin-top: 0px;
							margin-left: 0px;
*/							
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
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;

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
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
/*
							margin-top: 0px;
							margin-left: 0px;
*/							
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
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
						
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
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
/*
							margin-top: 0px;
							margin-left: 0px;
*/							
							margin: 0px;
						}

						.Button-emptyStonePosCornerBottomRight:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerBottomRight:focus {
							background-color: #b80000;
						}
						
						
						



						.Button-emptyStonePosLeft {
							padding: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 0px;
							margin-left: 0px;
							margin-right: 1px;							
						}

						.Button-emptyStonePosRight {
							padding: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 0px;
							margin-left: 1px;
							margin-right: 0px;							
						}



						.Button-emptyStonePosTopPillarLeftSide {
							padding: 9px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 2px;
							margin-right: 2px;
						}

						.Button-emptyStonePosTopPillarLeftSide:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosTopPillarLeftSide:focus {
							background-color: #b80000;
						}

						/*
						TO-DO: -reverify: this; size SQUARE, NOT as rest
						*/
						.Button-emptyStonePosTopPillarLeftSideImmediate {
							padding: 8px;
							padding-bottom: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 2px;
							margin-right: 1px;
							margin-left: 2px;
							margin-bottom: 0px;
						}

						.Button-emptyStonePosTopPillarLeftSideImmediate:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosTopPillarLeftSideImmediate:focus {
							background-color: #b80000;
						}
						
						.Button-emptyStonePosTopPillarRightSide {
							padding: 9px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 2px;
							margin-left: 0px;
						}
						
						.Button-emptyStonePosTopPillarRightSide:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosTopPillarRightSide:focus {
							background-color: #b80000;
						}
						
						
						.Button-emptyStonePosTop {
							padding: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 0px;
							margin-right: 0px;
						}

						.Button-emptyStonePosTop:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosTop:focus {
							background-color: #b80000;
						}
						
						

						
						
						.Button-emptyStonePosTopPillarLeftSide:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosTopPillarLeftSide:focus {
							background-color: #b80000;
						}

						/*
						TO-DO: -reverify: this; size SQUARE, NOT as rest
						*/
						.Button-emptyStonePosTopPillarLeftSideImmediate {
							padding: 8px;
							padding-bottom: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 2px;
							margin-right: 1px;
							margin-left: 2px;
							margin-bottom: 0px;
						}

						.Button-emptyStonePosTopPillarLeftSideImmediate:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosTopPillarLeftSideImmediate:focus {
							background-color: #b80000;
						}
						
						.Button-emptyStonePosTopPillarRightSide {
							padding: 9px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 2px;
							margin-left: 0px;
						}
						
						.Button-emptyStonePosTopPillarRightSide:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosTopPillarRightSide:focus {
							background-color: #b80000;
						}
						
						
						.Button-emptyStonePosBottom {
							padding: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 0px;
							margin-right: 0px;
						}

						.Button-emptyStonePosBottom:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosBottom:focus {
							background-color: #b80000;
						}
						
						/*
						TO-DO: -reverify: this; size SQUARE, NOT as rest
						*/
						.Button-emptyStonePosBottomPillarLeftSideImmediate {
							padding: 8px;
							padding-bottom: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 0px;
							margin-right: 1px;
							margin-left: 2px;
							margin-bottom: 2px;
						}

						.Button-emptyStonePosBottomPillarLeftSideImmediate:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosBottomPillarLeftSideImmediate:focus {
							background-color: #b80000;
						}
						
						.Button-emptyStonePosBottomPillarLeftSide {
							padding: 9px;
							padding-bottom: 10px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-top: 0px;
							margin-right: 0px;
							margin-left: 0px;
							margin-bottom: 2px;
						}

						.Button-emptyStonePosBottomPillarLeftSide:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosBottomPillarLeftSide:focus {
							background-color: #b80000;
						}
						
						
						
						.Button-emptyStonePosBottomPillarRightSide {
							padding: 9px;
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-bottom: 2px;
							margin-left: 0px;
						}
						
						.Button-emptyStonePosBottomPillarRightSide:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosBottomPillarRightSide:focus {
							background-color: #b80000;
						}
						
						
						.Button-stonePos {
							padding: 9px;
							background-color: #ff0000;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							margin-left: 0px;
						}

						.Button-stonePos:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-stonePos:focus {
							background-color: #b80000;
						}
						
						/* noted by Mike, 20220820
						using: absolute positions; 
						add: auto-identify IF mobile*/
						.Image64x64Tile {
							position: absolute;
  							clip: rect(0px,64px,64px,0px);
						}
						
						.Image64x64TileFrame1 {
							position: absolute;
  							clip: rect(0px,64px,64px,0px);
						}

						.Image64x64TileFrame2 {
							position: absolute;
  							/*clip: rect(0px,128px,64px,64px);*/
  							clip: rect(0px,64px,64px,0px);
							object-position: -64px; /*TO-DO: -add: current position*/
						}
						

<!-- Reference: https://stackoverflow.com/questions/7291873/disable-color-change-of-anchor-tag-when-visited; 
	last accessed: 20200321
	answer by: Rich Bradshaw on 20110903T0759
	edited by: Peter Mortensen on 20190511T2239
-->
						a {color:#0011f1;}         /* Unvisited link  */
						a:visited {color:#0011f1;} /* Visited link    */
						a:hover {color:#0011f1;}   /* Mouse over link */
						a:active {color:#593baa;}  /* Selected link */												
    /**/
    </style>
    <title>
      囲碁 STAGE
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
	  

// NOTE:
//reference: https://stackoverflow.com/questions/8663246/javascript-timer-loop;
//last accessed: 20220424
//answer by: keyboardP, 20111229T0158
//edited by: Ken Browning, 20111229T0200
//edited by Mike, 20220820

function myUpdateFunction( )
{
//	alert("count!");
	//TO-DO: -add: update logic
	//TO-DO: -add: re-draw stage/canvas
	
	var imgUsbongLogo = document.getElementById("usbongLogoId");
	//imgUsbongLogo.style.visibility="hidden";
	
	//added by Mike, 20220820
	var imgIpisTile = document.getElementById("ipisTileImageId");


	if(imgUsbongLogo.style.visibility === "visible"){
	  imgUsbongLogo.style.visibility="hidden";
	}
	else {
	  imgUsbongLogo.style.visibility="visible";
	}	
	 
	//added by Mike, 20220820
	//if class exists, remove; else, add the class;
	//imgIpisTile.classList.toggle('Image64x64TileFrame2');	 

	//reference: https://www.w3schools.com/jsref/prop_html_classname.asp;
	//last accessed: 20220820
	if (imgIpisTile.className=='Image64x64TileFrame1') {
	  imgIpisTile.className='Image64x64TileFrame2';
	}
	else {
	  imgIpisTile.className='Image64x64TileFrame1';
	}
	
	//added by Mike, 20220821; OK
	//note: myUpdateFunction() executes only 
	//when Web Browser is set to be FOCUSED;
	let imgIpisTileX = imgIpisTile.getBoundingClientRect().x;
	//edited by Mike, 20220822; OK
	//imgIpisTile.style.left =  imgIpisTileX+1+"px";	
}

//every 5secs
//setInterval(myUpdateFunction, 5000);
//edited by Mike, 20220822; increase world's repaint speed;
//add: delay in object's repaint speed
setInterval(myUpdateFunction, 100); //200); //1/5 of second


//added by Mike, 20220822
function onLoad() {
	document.body.onkeydown = function(e){
	//alert("e.keyCode: "+e.keyCode);
		
		var imgIpisTile = document.getElementById("ipisTileImageId");

		//added by Mike, 20220821; OK
		//note: myUpdateFunction() executes only 
		//when Web Browser is set to be FOCUSED;
		let imgIpisTileX = imgIpisTile.getBoundingClientRect().x;
		
		//OK; //note: unicode keycode, where: key D : 100?
		//note: auto-accepts keyhold; however, with noticeable delay 
		if (e.keyCode==68) { //key D
//			alert("dito");
			imgIpisTile.style.left =  imgIpisTileX+2+"px";				
		}
		else if (e.keyCode==65) { //key A			
			imgIpisTile.style.left =  imgIpisTileX-2+"px";				
		}


	}
}		

		//SVGH
		function copyText(iCount){
//			alert("hello"+iCount);
	 
			//Reference: https://stackoverflow.com/questions/51625169/click-on-text-to-copy-a-link-to-the-clipboard;
			//last accessed: 20200307
			//answer by: colxi on 20180801; edited by: Lord Nazo on 20180801	 
/*	 
			var holdText = document.getElementById("patientNameId"+iCount).innerText;

			const el = document.createElement('textarea');
		    el.value = holdText;
			document.body.appendChild(el);
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);

			//alert("text: "+holdText);
*/
			var sHoldTextPatientName = document.getElementById("patientNameId"+iCount).innerText;
			var sHoldTextFee = document.getElementById("feeId"+iCount).innerText; //.innerText;

//			alert("sHoldTextPatientName: "+sHoldTextPatientName);
//			alert("sHoldTextFee: "+sHoldTextFee);

			var sHoldTextTransactionTypeName = document.getElementById("transactionTypeNameId"+iCount).innerText;

			var sTreatmentTypeName = document.getElementById("treatmentTypeNameId"+iCount).innerText;

			var sDiscountAmount = "";
			var sTotalAmount = "0";
			
			if (sHoldTextTransactionTypeName=="CASH") {
				//alert("CASH!");
				sTotalAmount = sHoldTextFee;
			}
			else if (sHoldTextTransactionTypeName=="SC/PWD") {
				//note: solve the values of the other variables using one (1) known variable value
				sTotalAmount = sHoldTextFee
				sHoldTextFee = -sHoldTextFee/(0.20-1);
				sDiscountAmount = "" + sHoldTextFee*0.20;
			}
			else if (sHoldTextTransactionTypeName=="NC") {
				sHoldTextFee = "NC";				
				sTotalAmount = "NC";				
			}						
			else { //hmo
				sHoldTextFee = "HMO";				
				sTotalAmount = sHoldTextTransactionTypeName.toLowerCase();				
			}
			
			const el = document.createElement('textarea');
/*		    
			el.value = sHoldTextPatientName+ "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			document.body.appendChild(el);
*/			

			sTreatmentTypeName = sTreatmentTypeName.toUpperCase();
			
			if ((sTreatmentTypeName=="SWT") || (sTreatmentTypeName=="SHOCKWAVE")) {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" +sHoldTextFee + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="LASER") {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" +sHoldTextFee + "\t" + "\t" + sDiscountAmount + "\t" + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="OT") {
				el.value = sHoldTextPatientName + "\t" + "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="IN-PT") {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else {
				el.value = sHoldTextPatientName+ "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			
			document.body.appendChild(el);							
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);

//			alert("text: "+sHoldTextPatientName + sHoldTextFee);//el.value);

		}
/*	  
		  defaultScrollWidth = 0;
		  
		  function auto_grow(element) {
			element.style.height = "5px";
			element.style.height = (element.scrollHeight*4)+"px";

			if (defaultScrollWidth == 0) {
				defaultScrollWidth = element.scrollWidth; //i.e. 42% of the width of the full width of the Browser Window
				alert("defaultScrollWidth: "+defaultScrollWidth);
			}
			else if (element.scrollWidth < defaultScrollWidth){
//				defaultScrollWidth = 100%;
				defaultScrollWidth = element.scrollWidth;
//				alert("defaultScrollWidth: "+defaultScrollWidth);

			}
				
			element.style.width = defaultScrollWidth; //(element.scrollWidth+element.scrollWidth*0.42)+"px";			
		  }
*/

		function copyTextMOSC(iCount){
//			alert("hello"+iCount);
	 
			//Reference: https://stackoverflow.com/questions/51625169/click-on-text-to-copy-a-link-to-the-clipboard;
			//last accessed: 20200307
			//answer by: colxi on 20180801; edited by: Lord Nazo on 20180801	 

			var sHoldTextPatientName = document.getElementById("patientNameId"+iCount).innerText;
			
			const el = document.createElement('textarea');

			el.value = sHoldTextPatientName;
			
			document.body.appendChild(el);							
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);

//			alert("text: "+sHoldTextPatientName + sHoldTextFee);//el.value);

		}


		//added by Mike, 20220415				
		function myPopupFunction(iButtonId) {			
			//TO-DO: -update: this
			//+iCount
			var iMyCurrentChargeCount = document.getElementById("myCurrentChargeCountId").value; //innerText
			
			//do the following omyUpdateFunctionnly if value is a Number, i.e. not NaN
			if (!isNaN(iMyCurrentChargeCount)) {		
				//alert(iMyCurrentChargeCount);
				
				//auto-verify IF charge count sufficient to execute ACTION, e.g. PUNCH
				//added by Mike, 20220416
				//note: @present, max action COST = 1
				
				if ( (iButtonId!=0) && (iButtonId!=1)){ //CHARGE Button OR GUARD Button
					if (iMyCurrentChargeCount<=0) {
/* //edited by Mike, 20220417						
						alert("INSUFFICIENT CHARGE!");

//						document.getElementById("iButtonId2").focus=false; 				
						
						//reference:					
						//https://stackoverflow.com/questions/15897434/javascript-refresh-parent-page-without-entirely-reloading
						//answer by: decden, 20130419T0858
						//edited by: CommunityBot, 20170523T1159
						window.location = window.location;
*/
						//TO-DO: -add: IF player count >= 2
						document.getElementById("spanMyCurrentChargeCountP1Id").style="color:red"; 	
						
						//TO-DO: -add: rest of button ID's
						//edited by Mike, 20220417
//						document.getElementById("iButtonId2").blur(); 				
						//document.getElementById("iButtonId"+2).blur(); 	
						document.getElementById("iButtonId"+iButtonId).blur(); 	
 										
						return;
					}
				}				
			}
		
/* //removed by Mike, 20210902
			//added by Mike, 20210424
			//note: we add this command to prevent multiple button clicks
			//received by computer server before identifying that a patient transaction
			//already exists in Cart List from Database
			document.getElementById("addButtonId").disabled = true;
*/
			window.location.href = "<?php echo site_url('canvas/confirm/"+iButtonId+"');?>";
	
			//added by Mike, 20210424
			//note: no need to add this due to computer enables button after reloading page
//			document.getElementById("addButtonId").disabled = false;
//			setTimeout(setButton("addButtonId",false),300000);
		}			
	  </script>
  <!-- edited by Mike, 20220822 -->
  <body onload="onLoad();">
    <table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img id="usbongLogoId" class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<h2>
				囲碁 STAGE
			</h2>		
		</td>
	  </tr>
	</table>
<!-- removed by Mike, 20220424
	<br/>
-->		
	<input type="hidden" id="myCurrentChargeCountId" 
		value="<?php //TO-DO: -update: this to have >= 2 Players
				if (isset($iMyCurrentChargeCountP1)) {		
					echo $iMyCurrentChargeCountP1; //1
				}
				else {
					echo 0;							
				}?>" 
	required>
	
	<?php	
		//added by Mike, 20220416
		if (!isset($iMyCurrentChargeCountP1)) {
			$iMyCurrentChargeCountP1=0;
		}
		
/* //edited by Mike, 20220417		
		echo "PLAYER1 CHARGE COUNT: ".$iMyCurrentChargeCountP1."<br/>";
		echo "PLAYER2 CHARGE COUNT: "."0"."<br/>"; //$myCurrentChargeCountP2
*/
		echo "PLAYER1 CHARGE COUNT: <span id='spanMyCurrentChargeCountP1Id'>".$iMyCurrentChargeCountP1."</span><br/>";
		echo "PLAYER2 CHARGE COUNT: <span id='spanMyCurrentChargeCountP2Id'>"."0"."</span><br/>"; //$myCurrentChargeCountP2
		
	//removed by Mike, 20220424	
//		echo "<br/>";
		
/* //edited by Mike, 20220416		
//		echo "PLAYER1 INPUT: ".$data['inputParam']."<br/>";
		echo "PLAYER1 INPUT: ".$sInputAsButtonText0."<br/>";
		//edited by Mike, 20220415
//		echo "PLAYER2 INPUT: CHARGE<br/>";	
		echo "PLAYER2 INPUT: ".$sInputAsButtonText1."<br/>";
*/

/*	//removed by Mike, 20220424
		echo "PLAYER1 ACTION: ".$sInputAsButtonText0."<br/>";
		echo "PLAYER2 ACTION: ".$sInputAsButtonText1."<br/>";
		
		echo "<br/>";
*/		
		switch($iHitPlayerId) {
			case 1: //PLAYER1
				echo "HITS PLAYER 1!";
				break;
			case 2: //PLAYER2
				echo "HITS PLAYER 2!";
				break;
			case -1: //NO HIT
				echo "NO PLAYER HIT!";
				break;
		}
				
	?>
	<br/>

	<?php	
		$chargeButtonId=0;
		$defendGuardButtonId=1;
		$attackPunchButtonId=2;
		$attackSpecialButtonId=3;
		$attackThrowButtonId=4;
		$defendReflectButtonId=5;
	?>

<!-- edited by Mike, 20220424	
	<table class="addPatientTable">
	<tr>
		<td>
			<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-attackPunch" id="iButtonId<?php echo $attackPunchButtonId;?>">[PUNCH]</button>			
		</td>
		<td>
			<button onclick="myPopupFunction(<?php echo $attackThrowButtonId;?>)" class="Button-attackThrow" id="iButtonId<?php echo $attackThrowButtonId;?>">[THROW!]</button>			
		</td>
		<td>
			<button onclick="myPopupFunction(<?php echo $attackSpecialButtonId;?>)" class="Button-attackSpecial" id="iButtonId<?php echo $attackSpecialButtonId;?>">[SPECIAL]</button>			
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			<button onclick="myPopupFunction(<?php echo $defendGuardButtonId;?>)" class="Button-defendGuard" id="iButtonId<?php echo $defendGuardButtonId;?>">[ GUARD ]</button>			
		</td>
		<td>
			<button onclick="myPopupFunction(<?php echo $defendReflectButtonId;?>)" class="Button-defendReflect" id="iButtonId<?php echo $defendReflectButtonId;?>">[REFLECT]</button>			
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			<button onclick="myPopupFunction(<?php echo $chargeButtonId;?>)" class="Button-charge" id="iButtonId<?php echo $chargeButtonId;?>">[CHARGE]</button>			
		</td>
		<td>
		</td>
	</tr>
	</table>
-->
	<table class="addPatientTable">
<?php 
	$iRowCountMax=9;
	$iColumnCountMax=9;
	
	for ($iRowCount=0; $iRowCount<$iRowCountMax; $iRowCount++) {
		echo "<tr>";
		for ($iColumnCount=0; $iColumnCount<$iColumnCountMax; $iColumnCount++) {
?>			
			<td>
<!-- TO-DO: -update: this			
				<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-stonePosition" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
-->

<!-- TO-DO: -add: auto-identify position in BOARD;
	example: corners, top, bottom, left, right sides, center
-->			

				<table>
<!--
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
-->
<?php 	
				//TOP-LEFT CORNER
				if (($iRowCount==0) and ($iColumnCount==0)) {
?>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerTopLeft" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerTopLeft" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerTopLeft" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerTopLeftPillar" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>					
<?php 	
				}
				//added by Mike, 20220428
				else if (($iRowCount<$iRowCountMax-1) and ($iColumnCount==0)) {
?>
<!--
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosLeft" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosLeft" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>		
-->
<?php 	
				}
				else if (($iRowCount==$iRowCountMax-1) and ($iColumnCount==0)) {
?>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerBottomLeft" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerBottomLeftPillar" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerBottomLeft" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerBottomLeft" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>		
<?php 	
				}
				else if (($iRowCount==$iRowCountMax-1) and ($iColumnCount==$iColumnCountMax-1)) {
?>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerBottomRightPillar" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerBottomRight" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerBottomRight" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerBottomRight" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>	
<?php 	
				}
				//immediately to the right of TOP-LEFT Pillar
				else if (($iRowCount==0) and ($iColumnCount==1) and ($iColumnCount<$iColumnCountMax-1)) {
?>
<!--
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosTop" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosTop" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosTopPillarLeftSideImmediate" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosTopPillarRightSide" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>		
-->					
<?php 						

				}
				else if (($iRowCount==0) and ($iColumnCount>1) and ($iColumnCount<$iColumnCountMax-1)) {
?>
<!--
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosTop" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosTop" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosTopPillarLeftSide" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosTopPillarRightSide" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>	
-->					
<?php 						
				}
				else if (($iRowCount==0) and ($iColumnCount==$iColumnCountMax-1)) {
?>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerTopRight" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerTopRight" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerTopRightPillar" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCornerTopRight" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>							
<?php 	

				}

				//added by Mike, 20220428
				else if (($iRowCount<$iRowCountMax-1) and ($iColumnCount==$iColumnCountMax-1)) {
?>
<!--
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosRight" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosRight" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>		
-->					
<?php 	
				}
				//immediately to the right of BOTTOM-LEFT Pillar
				else if (($iRowCount==$iRowCountMax-1) and ($iColumnCount==1) and ($iColumnCount<$iColumnCountMax-1)) {
?>
<!--
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosBottomPillarLeftSideImmediate" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosBottomPillarRightSide" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosBottom" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosBottom" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>		
-->
<?php 						

				}
				else if (($iRowCount==$iRowCountMax-1) and ($iColumnCount>1) and ($iColumnCount<$iColumnCountMax-1)) {
?>
<!--
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosBottomPillarLeftSide" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosBottomPillarRightSide" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>					
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosBottom" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosBottom" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>		
-->					
<?php 						
				}
				else {
?>				
<!--
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
						<td>
							<button onclick="myPopupFunction(<?php echo $attackPunchButtonId;?>)" class="Button-emptyStonePosCenter" id="iButtonId<?php echo $attackPunchButtonId;?>"></button>			
						</td>
					</tr>
-->					
<?php
				}
?>
				</table>
			</td>
<?php			
		}
		echo "</tr>";
	}
?>	
	</table>
<br/>
<br/>			
	<!-- added by Mike, 20220820; 
		 reference: https://www.w3schools.com/cssref/pr_pos_clip.asp; last accessed: 20220820
		 //Image64x64Tile
	-->
	<img id="ipisTileImageId" class="Image64x64TileFrame1" src="<?php echo base_url('assets/images/ipis.png');?>">	
	
	
<!-- removed by Mike, 20220424
	<br />
	<br />
	<br />
-->
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>
