<?php if(!class_exists('TPL')){exit;}?><!-- Chapter <?php echo $chapter_modal['type']; ?> modal for all chapters -->
<a id="chapter_<?php echo $chapter_modal['type']; ?>_anchor" name="chapter_<?php echo $chapter_modal['type']; ?>"></a>
<div id="chapter_<?php echo $chapter_modal['type']; ?>" class="modal" style="display: none; border-radius: 50px;">
	<div class="modal-content <?php echo $website['Style']['tab']['black']; ?> <?php echo $website['Style']['text_highlight']; ?><?php echo $chapter_modal['class']; ?>" style="width: 100%; border-radius: 50px; padding-bottom: 8%;">
		<!-- Hide modal button -->
		<button class="w3-btn <?php echo $website['Style']['button']['theme']['light']; ?>" onclick="Hide_Modal('<?php echo $chapter_modal['type']; ?>');" style="float: right; padding: 2px 14px 3px 15px !important;">
			<h4 class="text_size" style="font-weight: bold;">
				X
			</h4>
		</button>
		<br /><br /><br />

		<!-- "<?php echo $chapter_modal['text']; ?>" text -->
		<h2 class="text_size <?php echo $website['Style']['text_highlight']; ?>" style="font-weight: bold;">
			<?php echo $chapter_modal["text"]; ?>:<br />
			<span id="chapter_<?php echo $chapter_modal['type']; ?>_title">?</span> <?php echo $chapter_modal["icon"]; ?>
		</h2>
		<br />

		<!-- <?php echo $chapter_modal['type_title']; ?> form -->
		<form name="Story_<?php echo $chapter_modal['type_title']; ?>" method="POST" data-netlify="True">
			<input type="hidden" name="form-name" value="Story_<?php echo $chapter_modal['type_title']; ?>">
			<input type="hidden" name="website_title" value="<?php echo $website['Data']['titles']['language']; ?>">
	
			<!-- My name input -->
			<h2 class="text_size margin_top_bottom_2_cent <?php echo $website['Style']['text_highlight']; ?>" style="font-weight: bold;">
				<?php echo $website["Language texts"]["my_name"]; ?>:<br />
			</h2>
			<input type="text" name="name" class="w3-input text_size <?php echo $website['Style']['button']['theme']['light']; ?>" style="width: 100%; font-weight: bold; border-radius: 50px;">

			<!-- Hidden chapter title input -->
			<input id="chapter_<?php echo $chapter_modal['type']; ?>_value" type="hidden" name="chapter" value="" class="w3-input <?php echo $website['Style']['button']['theme']['light']; ?>" style="width: 100%; display: none; font-weight: bold; border-radius: 50px; text-align: center;">

<?php if( isset($chapter_modal['comment_input']) ){ ?>
<?php echo $chapter_modal['comment_input']; ?>
<?php } ?>
			<br />

			<!-- Submit form button -->
			<button type="submit" class="w3-btn <?php echo $website['Style']['button']['theme']['light']; ?>" style="float: right; border-radius: 50px;">
				<h2 class="text_size">
					<b><?php echo $website["Language texts"]["send, title()"]; ?>: <?php echo $website["Icons"]["paper_plane"]; ?></b>
				</h2>
			</button>

			<br class="mobile_inline_block" /><br class="mobile_inline_block" />
		</form>
	</div>
</div>