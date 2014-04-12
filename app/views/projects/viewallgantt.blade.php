<div class="container">
<div class="gantt"></div>

</div>

	

  <script>
		$(function() {

	$(".gantt").gantt({
	source: "project/viewallgantt",
	scale: "weeks",
	minScale: "weeks",
	
	maxScale: "months",
	onItemClick: function(data) {
		alert("Item clicked - show some details");
	},
	onAddClick: function(dt, rowId) {
		alert("Empty space clicked - add an item!");
	},
	onRender: function() {
		console.log("chart rendered");
	}
});

		});
  </script>        
        </div>