/**===================================================*/
/**鍒ゆ柇琛ㄦ牸鈥渢heForm鈥濅笅鐨勫厓绱犳槸鍚︿负绌�,鐣欒█鏉跨殑鍙风爜鏄惁姝ｇ‘*/
/**===================================================*/
function judge (form){
	
	this.errMsg = new Array(); 
	var form = form == null ? 'theForm' : form;//璁剧疆琛ㄥ崟鍚嶇О榛樿鍙傛暟
	
	////////////////////////
	this.required = function(controlId, msg) {
		
		var obj = document.forms[form].elements[controlId];
		
		if (typeof(obj) == "undefined" || obj.value == "" || obj.value == "undefined" || obj.value.replace(/(^\s*)|(\s*$)/g, "")==""){
			
			this.errMsg.push(msg);
		}
	};
	/////////////////////////////
	this.passed = function() {
		
	    if (this.errMsg.length > 0) {
	    	
	    	var msg = "";
	    	msg+= "-" + this.errMsg[0];
	    	alert(msg);
	    	return false;
	      
	    } else {
	    	
	    	return true;
	    }
	};
	/////////////////////////////
	this.phone = function() {
		
		var phone = document.forms[form].elements['phone'];
		
		if(phone.value.length == 0 || phone.value.search(/^1\d{10}$/) == -1){ //鍖归厤鎵嬫満鍙�
			
			alert("璇疯緭鍏�11浣嶆湁鏁堢殑鎵嬫満鍙风爜锛�(^_^)"); phone.focus();
			
			return false;
			
		}else
			
			return true;
	}
	/////////////////////////////
	
}
/*---------------------------------
    妫€鏌ユ墜鏈哄彿鐮佹槸鍚︽弧瓒�11浣�
 --------------------------------*/
function checkPhone(){
	
	var phoneNum = document.getElementById("phone");
	
	if(phoneNum.value.length == 0 || phoneNum.value.search(/^1\d{10}$/) == -1){//鍖归厤鎵嬫満鍙�
		
		alert("璇疯緭鍏�11浣嶆湁鏁堢殑鎵嬫満鍙风爜锛�(^_^)");
		return false;
		
	}else
		return true;
}
/*---------------------------------
    闃叉琛ㄥ崟澶氭鎻愪氦骞跺脊鍑虹暀瑷€鎴愬姛鎻愮ず 
--------------------------------*/
var submitOnce = (function () {
	   var submitCount = 0;  
	    return function () {
			if (submitCount == 0){  
		         submitCount++;  
		         alert("鐣欒█鎴愬姛锛佹垜浠細灏藉揩鑱旂郴鎮ㄧ殑,璇疯€愬績绛夊€�"); 
		         return true;  
			} else{  
	        	alert("浣犲凡缁忕暀杩囪█浜嗭紝璇蜂笉瑕侀噸澶嶆彁浜わ紝璋㈣阿锛�");  
	        	return false;  
			}  
		}
	})();

/**===================================================*/
/**缁欏揩鎹风暀瑷€娣诲姞鐐瑰嚮浜嬩欢*/
/**===================================================*/
function tipsAddClickEvent() {
	
	function $(id){ 
		return document.getElementById(id);
	};
	
	var tips = [
	       "1.椤圭洰寰堝ソ锛岀幇鍦ㄥ氨鎯冲姞鍏ワ紝璇风粰鎴戦鐣欏悕棰濄€�",
	       "2.璇烽棶璐靛叕鍙稿摢閲屾湁鏍锋澘搴楋紵",
	       "3.璇风粰鎴戞墦鐢佃瘽锛屽苟瀵勬嫑鍟嗚祫鏂欍€�",
	       "4.鎴戞兂璇︾粏鐨勪簡瑙ｆ嫑鍟嗘斂绛栵紝璇风數璇濊仈绯汇€�",
	       "5.瀵硅繖涓」鐩緢鎰熷叴瓒ｏ紝璇峰敖蹇瘎璧勬枡銆�",
	       "6.璇烽棶鎴戣繖涓湴鏂规湁鍔犲叆鑰呬簡鍚楋紵",
	       "7.鎴戞兂鍔犲叆锛岃鏉ョ數璇濆憡璇夋垜鍏蜂綋缁嗚妭銆�",
	       "8.鎯充簡瑙ｆ嫑鍟嗙粏鑺傦紝璇峰敖蹇瘎涓€浠借祫鏂欍€�",
	       "9.寰堟劅鍏磋叮锛屾潵鐢佃瘽缁嗚皥鍚э紒",
	       "10.鎴戞兂鎵句竴涓悎閫傜殑椤圭洰鍋氾紝鎯冲姞鍏ユ偍浠€�"
	       ];
	
	var tarea = [];

	for(var i = 0, m = tips.length; i < m; i ++){

		$("tips"+i).onclick = (function(i){
			
			return function(){
				
				var s = tarea.join(",") .indexOf(tips[i]);
				
				if(s >= 0){  //s绛変簬-1灏辫鏄巟[i]涓嶅瓨鍦▂閲岄潰
					for(var r in tarea){
						if(tarea[r] == tips[i]){//鎵惧嚭y鏁扮粍閲岄潰x[i]鐨勪綅缃�
							tarea.splice(r, 1);//鍒犻櫎宸叉坊鍔犵殑鎻愮ず
						}
					}
				}else{
					
					tarea.push(tips[i]);//寰€y鏁扮粍灏鹃儴娣诲姞鍐呭
				}
				$("tamsg").value = tarea.join("\n");
			}
		})
		(i)//闂寘閲岄潰浼犲弬
	}
}