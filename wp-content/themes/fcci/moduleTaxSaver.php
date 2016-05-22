
<?php $themeURL = get_bloginfo('template_directory'); ?>

<div id="moduleFreeTaxSaver">
<h3>Free TaxSaver Analysis</h3>
<div id="taxSaverAnalysis">
	<form action="/" id="formAnalyze">
		<div>
			<label>Industry:</label>
			<select class="theDropDown formInput tax_in" id="ddlIndustries" name="ddlIndustries"><option value="accomodation and food services">accomodation and food services</option>
				<option value="arts, entertainment and recreation">arts, entertainment and recreation</option>
				<option value="construction">construction</option>
				<option value="educational services">educational services</option>
				<option value="finance and insurance">finance and insurance</option>
				<option value="health care and social assistance">health care and social assistance</option>
				<option value="information">information</option>
				<option value="manufacturing">manufacturing</option>
				<option value="mining and logging">mining and logging</option>
				<option value="other services">other services</option>
				<option value="professional and business services">professional and business services</option>
				<option value="real estate, rental and leasing">real estate, rental and leasing</option>
				<option value="retail trade">retail trade</option>
				<option value="transportation, warehousing and utilities">transportation, warehousing and utilities</option>
				<option value="wholesale trade">wholesale trade</option>
			</select>
		</div>


		<div class="formRow">
			<label>ZIP Code:</label>
			<div class="formInput">
				<input maxlength="5" name="txtZipCode" id="txtZipCode" type="text" class="tax_in"/>
				<span id="zipError" class="errorMsg"></span>
			</div>
		</div>

		<div class="formRow">
			<label># of Employees:</label>
		 	<div class="formInput">
		 		<input name="txtNumberOfEmployees" id="txtNumberOfEmployees" type="text" class="tax_in" />
			 	<span id="employeesError" class="errorMsg"></span>
			 </div>
		 </div>
		<div class="formRow">
			<button id="btnAnalyze">Analyze</button>
			<div id="analysisWait"><img src="
<?php echo $themeURL; ?>/images/spinnerWhite.gif" alt="Calculating..." /><br />Calculating...
			</div>
			<div id="analysisResult"></div>

		</div>



		<div class="formRow" id="howIs">
			<a href="#" id="howis"><span id="iconHow">i</span>How does Free Tax Saver Analysis Work?</a>
			<div id="howisdiv">
			<a href="#" id="closeHowIs">close <span>x</span></a>
				<div id="howIsContent">
				The figure is computed based on data collected from:
					<ol>
						<li>The U.S. Department of Labor</li>
						<li>The U.S. Department of Housing and Urban Development</li>
						<li>Average tax savings earned by First Capitol Consulting, Inc for its clients in 2007.</li>
					</ol>
					It is an estimate only and may vary significantly from realized savings contingent on but not limited to number of employees, tax liability, physical address and other operational characteristics of the business in question.
				</div>
			</div>
		</div>
	</form>
</div><!-- taxSaverAnalysis -->
</div><!-- modualFreeTaxSaver -->