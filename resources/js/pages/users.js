/* ------------------------------------------------------------------------------
*
*  Contains User Pages Settings
*
*  Latest update: October 8, 2017
*
* ---------------------------------------------------------------------------- */

$(function() {

  // Array of objects
  

  // JSON array
  $(".selectbox-json-array ").selectBoxIt({
      autoWidth: false,

      // Populates the drop down using a JSON array
      populate: {"data": [
          {"text":"SelectBoxIt is:","value":"SelectBoxIt is:"},
          {"text":"a jQuery Plugin","value":"a jQuery Plugin"},
          {"text":"a Select Box Replacement","value":"a Select Box Replacement"},
          {"text":"a Stateful UI Widget","value":"a Stateful UI Widget"}
      ]}
  });
    
});
