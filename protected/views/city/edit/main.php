<script type='text/javascript'>
$(document).ready(function() {

	$("#cityCoordinators").selectize({
		plugins: ['remove_button'],
	});

	$("#cityForm").validate({
        submitHandler: function(form) {
            form.submit();
        },
        onsubmit: true,
        onkeyup: false,
        focusCleanup: true,
        messages: {
        },
        errorPlacement: function(error, element) {
        },
        highlight: function(element, errorClass) {
            $element = $(element);
            $element.closest("div.form-group").addClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $element = $(element);
            $element.closest("div.form-group").removeClass(errorClass);
        },
        //where to post messages
        errorClass: "has-error",
        ignore: ":hidden",
        rules: {
            'name': 'required',
            'region': 'required'
        }
    });
});
</script>

<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<?php if(!empty($city)): ?>
			<h2>Edit City</h2>
			<?php else: ?>
			<h2>Create City</h2>
			<?php endif; ?>
		</div>
		<div class='col-md-12'>
			<?php if(Yii::app()->user->hasFlash('error')): ?>
		 	<div class="alert alert-danger">
		    <?php echo Yii::app()->user->getFlash('error'); ?>
			</div>
		 	<?php endif; ?>

		 	<?php if(Yii::app()->user->hasFlash('success')): ?>
		 	<div class="alert alert-success">
		    <?php echo Yii::app()->user->getFlash('success'); ?>
			</div>
		 	<?php endif; ?>
		</div>
		<div class='col-md-6'>
			<form id='cityForm' action='<?php echo $this->createUrl("city/save") ?>' method='post' enctype="multipart/form-data">
				<?php if(!empty($city)): ?>
				<input type='hidden' name='cityId' value='<?php echo $city->city_id ?>' />
				<?php endif; ?>

				<div class='form-group'>
					<label>Region</label>
					<select class='form-control' name='regionId' />
						<?php foreach ($regions as $region): ?>
						<option value='<?php echo $region->region_id ?>' <?php echo (!empty($city) && $region->region_id == $city->region_id)?"selected='selected'":"" ?>><?php echo $region->name ?></option>	
						<?php endforeach ?>
					</select>
				</div>
				<div class='form-group'>
					<label>Name</label>
					<input type='text' class='form-control' name='name' value='<?php echo !empty($city)?$city->name:"" ?>' />
				</div>
				<div class='form-group'>
					<label>Enabled</label>
					<input type="checkbox" name='enabled' value='1' <?php echo (!empty($city) && !empty($city->enabled))?"checked='checked'":"" ?> data-toggle="switch" />
				</div>

				<div class='form-group'>
					<label>City Coordinators</label>
					<select id='cityCoordinators' name='cityCoordinators[]' multiple>
						<?php foreach ($allCityCoordinators as $user): ?>
							<option value='<?php echo $user->user_id ?>' <?php echo in_array($user->user_id, $currentCityCoordinators)?"selected='selected'":"" ?>><?php echo $user->email ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class='form-group'>
					<label>City Sponsor Image</label>
					<input type='file' class='form-control' name='image' />
					<?php if(!empty($city) && !empty($city->img)): ?>
					<img src='<?php echo $city->img ?>' />
					<?php endif; ?>
				</div>

				<div class='form-group'>
					<label>City Sponsor Image Link URL</label>
					<input type='input' class='form-control' name='image_link_url' value='<?php echo !empty($city)?$city->img_link_url:"" ?>' />
				</div>

				<div class='form-group'>
					<input type='submit' class='btn btn-success' value='Save' />
				</div>
			</form>
		</div>
	</div>
</div>