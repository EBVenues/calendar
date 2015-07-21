<?php

/*Register Shortcode*/
function ebc_display_calendar( $atts, $content = null ) {
	$shortcode_text = '<div class="row">
        <div class="col-xs-12 col-sm-12">
			<div id="full-clndr" class="clearfix">
	          <script type="text/template" id="full-clndr-template">
	            <div class="clndr-controls">
	              <div class="clndr-previous-button">&lt;</div>
	              <div class="clndr-next-button">&gt;</div>
	              <div class="current-month"><%= month %> <%= year %></div>
	
	            </div>
	            <div class="clndr-grid">
	              <div class="days-of-the-week clearfix">
	                <% _.each(daysOfTheWeek, function(day) { %>
	                  <div class="header-day"><%= day %></div>
	                <% }); %>
	              </div>
	              <div class="days">
	                <% _.each(days, function(day) { %>
	                  <div class="<%= day.classes %>" id="<%= day.id %>">
	                  <span class="day-number"><%= day.day %></span>
	                  
	                  <!--List events in calendar block-->
	                  <div class="clndr-event">
						<% _.each(day.events, function(event){ %>
							<div class="event <%= event.type %>"><%= event.title %>
								<div class="buy-tickets"><a href="<%= event.url %>" target="_blank">Buy tickets</a></div>
							</div>
						<% }) %>
	                  </div>
	               </div><!--Day-->
	                <% }); %>
	              </div>
	            </div>
	          </script>
	        </div>
        </div><!--.col-xs-12 -->
	</div><!--.row-->';
	return $shortcode_text;
}
add_shortcode( 'eventbrite_calendar', 'ebc_display_calendar' );