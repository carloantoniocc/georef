
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_0_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["comuna_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_3_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["agenda_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["rce_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["indicaciones_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dental_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_4_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_5_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["rce_1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["indicaciones_1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_6_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["rce_2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["indicaciones_2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["triage_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_7_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_8_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_9_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["dispensacion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_10_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["laboratorio_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_11_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sc_field_12_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["erp_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pabellon_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["maternidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["archivo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["lme_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["comuna_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["comuna_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_3_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_3_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agenda_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agenda_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rce_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rce_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["indicaciones_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["indicaciones_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dental_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dental_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_4_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_4_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_5_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_5_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rce_1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rce_1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["indicaciones_1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["indicaciones_1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_6_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_6_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rce_2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rce_2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["indicaciones_2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["indicaciones_2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["triage_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["triage_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_7_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_7_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_8_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_8_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_9_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_9_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dispensacion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dispensacion_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_10_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_10_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["laboratorio_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["laboratorio_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_11_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_11_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_12_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_12_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["erp_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["erp_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pabellon_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pabellon_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["maternidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["maternidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["archivo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["archivo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lme_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lme_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbl_georref_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbl_georref_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_0__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_0__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_0__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_1__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_1__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_1__onfocus(this, iSeqRow) });
  $('#id_sc_field_comuna_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_comuna__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbl_georref_comuna__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbl_georref_comuna__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_2_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_2__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_2__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_2__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_3_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_3__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_3__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_3__onfocus(this, iSeqRow) });
  $('#id_sc_field_agenda_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_agenda__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbl_georref_agenda__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbl_georref_agenda__onfocus(this, iSeqRow) });
  $('#id_sc_field_rce_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_rce__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_tbl_georref_rce__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbl_georref_rce__onfocus(this, iSeqRow) });
  $('#id_sc_field_indicaciones_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_indicaciones__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_tbl_georref_indicaciones__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbl_georref_indicaciones__onfocus(this, iSeqRow) });
  $('#id_sc_field_dental_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_dental__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbl_georref_dental__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbl_georref_dental__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_4_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_4__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_4__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_4__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_5_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_5__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_5__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_5__onfocus(this, iSeqRow) });
  $('#id_sc_field_rce_1_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_rce_1__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbl_georref_rce_1__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbl_georref_rce_1__onfocus(this, iSeqRow) });
  $('#id_sc_field_indicaciones_1_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_indicaciones_1__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_tbl_georref_indicaciones_1__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tbl_georref_indicaciones_1__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_6_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_6__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_6__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_6__onfocus(this, iSeqRow) });
  $('#id_sc_field_rce_2_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_rce_2__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbl_georref_rce_2__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbl_georref_rce_2__onfocus(this, iSeqRow) });
  $('#id_sc_field_indicaciones_2_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_indicaciones_2__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_tbl_georref_indicaciones_2__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tbl_georref_indicaciones_2__onfocus(this, iSeqRow) });
  $('#id_sc_field_triage_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_triage__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbl_georref_triage__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbl_georref_triage__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_7_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_7__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_7__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_7__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_8_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_8__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_8__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_8__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_9_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_9__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_sc_field_9__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_sc_field_9__onfocus(this, iSeqRow) });
  $('#id_sc_field_dispensacion_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_dispensacion__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_tbl_georref_dispensacion__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbl_georref_dispensacion__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_10_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_10__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbl_georref_sc_field_10__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbl_georref_sc_field_10__onfocus(this, iSeqRow) });
  $('#id_sc_field_laboratorio_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_laboratorio__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbl_georref_laboratorio__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbl_georref_laboratorio__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_11_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_11__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbl_georref_sc_field_11__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbl_georref_sc_field_11__onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_12_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_sc_field_12__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbl_georref_sc_field_12__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbl_georref_sc_field_12__onfocus(this, iSeqRow) });
  $('#id_sc_field_erp_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_erp__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_tbl_georref_erp__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbl_georref_erp__onfocus(this, iSeqRow) });
  $('#id_sc_field_pabellon_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_pabellon__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbl_georref_pabellon__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbl_georref_pabellon__onfocus(this, iSeqRow) });
  $('#id_sc_field_maternidad_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_maternidad__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbl_georref_maternidad__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbl_georref_maternidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_archivo_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_archivo__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbl_georref_archivo__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbl_georref_archivo__onfocus(this, iSeqRow) });
  $('#id_sc_field_lme_' + iSeqRow).bind('blur', function() { sc_form_tbl_georref_lme__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_tbl_georref_lme__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbl_georref_lme__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbl_georref_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_0__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_0_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_0__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_0__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_1__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_comuna__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_comuna_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_comuna__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_comuna__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_2__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_3__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_3_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_3__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_3__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_agenda__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_agenda_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_agenda__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_agenda__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_rce__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_rce_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_rce__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_rce__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_indicaciones__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_indicaciones_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_indicaciones__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_indicaciones__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_dental__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_dental_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_dental__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_dental__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_4__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_4_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_4__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_4__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_5__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_5_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_5__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_5__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_rce_1__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_rce_1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_rce_1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_rce_1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_indicaciones_1__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_indicaciones_1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_indicaciones_1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_indicaciones_1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_6__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_6_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_6__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_6__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_rce_2__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_rce_2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_rce_2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_rce_2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_indicaciones_2__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_indicaciones_2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_indicaciones_2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_indicaciones_2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_triage__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_triage_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_triage__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_triage__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_7__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_7_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_7__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_7__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_8__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_8_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_8__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_8__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_9__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_9_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_9__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_9__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_dispensacion__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_dispensacion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_dispensacion__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_dispensacion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_10__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_10_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_10__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_10__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_laboratorio__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_laboratorio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_laboratorio__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_laboratorio__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_11__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_11_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_11__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_11__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_12__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_sc_field_12_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_sc_field_12__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_sc_field_12__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_erp__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_erp_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_erp__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_erp__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_pabellon__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_pabellon_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_pabellon__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_pabellon__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_maternidad__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_maternidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_maternidad__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_maternidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_archivo__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_archivo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_archivo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_archivo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbl_georref_lme__onblur(oThis, iSeqRow) {
  do_ajax_form_tbl_georref_validate_lme_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbl_georref_lme__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbl_georref_lme__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

