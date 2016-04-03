<div class="row" id="contaddimages">
	@if (count($images) > 0)
		@for ($i = 0; $i < count($images); $i++)
			<div class="col-sm-6 col-md-3" id="imagen_{{ $images[$i]['id'] }}">
				<div class="thumbnail">
					{{ Html::image('uploads/images/p_'.$images[$i]['imagen'], $images[$i]['imagen']) }}
					<div class="caption" data-id="{{ $images[$i]['id'] }}">
						<p class="text-center" >
							{{Form::checkbox('chk_images', $images[$i]['id'] )}}
						</p>
					</div>
				</div>
			</div>
		@endfor
	@endif
</div>