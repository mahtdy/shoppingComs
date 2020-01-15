function chech_count(qq){
	var str =qq;
	//var str =$("#test").val();
	var first_str=str.charAt(0);
	var res = first_str.match(/^[a-zA-Z0-9]+$/);
	 var i=1;
	 var mode=0;
	 var counter=0;
	 var dive ='';
	 var str_dive ='';
	 var count_str=str.length;
	 $("#qaz").html(count_str);
	// alert(res);
	 ///////////////////////////english mod////////////////////////////////////////
	if (res!=null)	{
		 if (count_str<=160){
			i=1;
			dive=160-count_str;
		 } else if (count_str<=306){
			i=2;
			dive=306-count_str;
		 }
		  else if (count_str<=459){
			i=3;
			dive=459-count_str;
		 }
		  else if (count_str<=612){
			i=4;
			dive=612-count_str;
		 }
		  else if (count_str<=765){
			i=5;
			dive=765-count_str;
		 }
		  else if (count_str<=918){
			i=6;
			dive=918-count_str;
		 }
		  else if (count_str<=1071){
			i=7;
			dive=1071-count_str;
		 }
		 else
		 dive='��� ��� ����� ��ѐ ��� ��� �� �� ���� ����� ����';
		
		  str_dive=" ( "+i+" ) "+dive;
			return(str_dive);
	}else {
	/////////////////////////////////persian mode///////////////////////////////////
		 if (count_str<=70){
			dive=70-count_str;
		 } 
		 else if (count_str<=134){
		 i=2;
			dive=134-count_str;
		 } 
		  else if (count_str<=201){
		 i=3;
			dive=201-count_str;
		 } 
		   else if (count_str<=268){
		 i=4;
			dive=268-count_str;
		 }
		else if (count_str<=335){
		 i=5;
			dive=335-count_str;
		 }		 
		    else if (count_str<=402){
		 i=6;
			dive=402-count_str;
		 }
		    else if (count_str<=469){
		 i=7;
			dive=469-count_str;
		 }
		    else if (count_str<=536){
		 i=8;
			dive=536-count_str;
		 }
		 else
		 dive='��� ��� ����� ��ѐ ��� ��� �� �� ���� ����� ����';
		 str_dive=" ( "+i+" ) "+dive;
		return (str_dive);
			
		}
	
}
