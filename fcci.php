	<script>
	$.ajaxSetup({
		cache: false
	});


	$(document).ready(function() {
		$("#btnAnalyze").live("click", function(){
			if ($.trim($("#txtZipCode").val()) == "" && $.trim($("#txtNumberOfEmployees").val()) == "") {
				$("#zipError").html("Please enter a zip code");
				$("#txtZipCode").focus();
				$("#employeesError").html("Please enter number of employees");
				return false;
			}

			if ($.trim($("#txtZipCode").val()) == "" && $.trim($("#txtNumberOfEmployees").val()) != "") {
				$("#zipError").html("Please enter a zip code");
				$("#employeesError").html("");
				$("#txtZipCode").focus();
				return false;
			}

			if ($.trim($("#txtZipCode").val()) != "" && $.trim($("#txtNumberOfEmployees").val()) == "") {
				$("#zipError").html("");
				$("#employeesError").html("Please enter number of employees");
				$("#txtNumberOfEmployees").focus();
				return false;
			}

			// Call;
			$("#analysisWait").show();

			var url = "response.txt";
			//var url = "/Content/DoMath/?industry=" + $.URLEncode($("#ddlIndustries").val()) + "&zip=" + $.URLEncode($("#txtZipCode").val()) + "&count=" + $.URLEncode($("#txtNumberOfEmployees").val());

			$("#analysisResult").load(url, null, function(response,status, xhr) {
				console.log(response);
				$("#analysisWait").hide();
				$("#analysisResult").show();
			});

			return false;
		});

		show = true;

		$("#closeHowIs").live("click",closeHowIs);
		$("#howis").live( "click", closeHowIs);
		$("#howisdiv").live( "click", closeHowIs);
	});

	function closeHowIs(){
		if( show )
				$("#howisdiv").fadeIn("slow");
			else
				$("#howisdiv").fadeOut("slow");

			show = !show;

			return false;

	}
	function Undo() {
		$("#txtZipCode").focus();
		$('#formAnalyze')[0].reset();
		document.getElementById("ddlIndusties").selectedIndex = 0;
		$("#txtZipCode").focus();
		$("#analysisResult").hide();
		return false;
	}
	$.extend({ URLEncode: function(c) {
		var o = ''; var x = 0; c = c.toString(); var r = /(^[a-zA-Z0-9_.]*)/;
		while (x < c.length) {
			var m = r.exec(c.substr(x));
			if (m != null && m.length > 1 && m[1] != '') {
				o += m[1]; x += m[1].length;
			} else {
				if (c[x] == ' ') o += '+'; else {
					var d = c.charCodeAt(x); var h = d.toString(16);
					o += '%' + (h.length < 2 ? '0' : '') + h.toUpperCase();
				} x++;
			}
		} return o;
	},
		URLDecode: function(s) {
			var o = s; var binVal, t; var r = /(%[^%]{2})/;
			while ((m = r.exec(o)) != null && m.length > 1 && m[1] != '') {
				b = parseInt(m[1].substr(1), 16);
				t = String.fromCharCode(b); o = o.replace(m[1], t);
			} return o;
		}
	});

	//Content/DoMath/?industry=accomodation+and+food+services&zip=91344&count=4&_=1354914421046
</script>
