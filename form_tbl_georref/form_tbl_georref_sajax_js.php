
 <form name="form_ajax_redir_1" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>
 <form name="form_ajax_redir_2" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        iElemTop  = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);

    $oElem.offset({top: iElemTop, left: iElemLeft});
  } // scCenterElement

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      scCenterElement(document.getElementById("id_debug_window"));
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay(sErrorId, bForce)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
      if (null == bForce)
      {
          bForce = true;
      }
      if (bForce)
      {
          var $oField = $('#id_sc_field_' + sErrorId);
          if (0 < $oField.length)
          {
              $oField.removeClass(sc_css_status);
          }
      }
    }
    if (document.getElementById("id_error_display_fixed"))
    {
      document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay

  function scAjaxShowErrorDisplay(sErrorId, sErrorMsg)
  {
    if (oResp && oResp['redirExitInfo'])
    {
      sErrorMsg += "<br /><input type=\"button\" onClick=\"window.location='" + oResp['redirExitInfo']['action'] + "'\" value=\"Ok\">";
    }
    sErrorMsg = scAjaxErrorSql(sErrorMsg);
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
      if ("table" == sErrorId)
      {
        scCenterElement(document.getElementById("id_error_display_" + sErrorId + "_frame"));
      }
      var $oField = $('#id_sc_field_' + sErrorId);
      if (0 < $oField.length)
      {
        $oField.addClass(sc_css_status);
      }
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "', false)", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
    /*else if ("table" == sErrorId)
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.left = posDispLeft + "px";
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.top = posDispTop + "px";
    }*/
  } // scAjaxShowErrorDisplay

  var iErrorSqlId = 1;

  function scAjaxErrorSql(sErrorMsg)
  {
    var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
        sTmpId;
    while (-1 < iTmpPos)
    {
      sTmpId    = "sc_id_error_sql_" + iErrorSqlId;
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline\" onClick=\"$('#" + sTmpId + "').show(); scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span onClick=\"$('#" + sTmpId + "').hide()\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
      iErrorSqlId++;
    }
    return sErrorMsg;
  } // scAjaxErrorSql

  function scAjaxHideMessage()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    _scAjaxShowMessage(scMsgDefTitle, oResp["msgDisplay"]["msgText"], false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
  } // scAjaxShowMessage

  var scMsgDefClose = "";

  function _scAjaxShowMessage(sTitle, sMessage, bModal, iTimeout, bButton, sButton, iTop, iLeft, iWidth, iHeight, sRedir, sTarget, sParam, bClose, bBodyIcon) {
    if ("" == sMessage) {
      if (bModal) {
        scMsgDefClick = "close_modal";
      }
      else {
        scMsgDefClick = "close";
      }
      _scAjaxMessageBtnClick();
      document.getElementById("id_message_display_title").innerHTML = scMsgDefTitle;
      document.getElementById("id_message_display_text").innerHTML = "";
      document.getElementById("id_message_display_buttone").value = scMsgDefButton;
      document.getElementById("id_message_display_buttond").style.display = "none";
    }
    else {
      document.getElementById("id_message_display_title").innerHTML = scAjaxSpecCharParser(sTitle);
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(sMessage);
      document.getElementById("id_message_display_buttone").value = sButton;
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_title_line").style.display = (bClose || "" != sTitle) ? "" : "none";
      document.getElementById("id_message_display_close_icon").style.display = bClose ? "" : "none";
      if (document.getElementById("id_message_display_body_icon")) {
        document.getElementById("id_message_display_body_icon").style.display = bBodyIcon ? "" : "none";
      }
      $("#id_message_display_content").css('width', (0 < iWidth ? iWidth + 'px' : ''));
      $("#id_message_display_content").css('height', (0 < iHeight ? iHeight + 'px' : ''));
      if (bModal) {
        iWidth = iWidth || 250;
        iHeight = iHeight || 200;
        scMsgDefClose = "close_modal";
        tb_show('', '#TB_inline?height=' + (iHeight + 6) + '&width=' + (iWidth + 4) + '&inlineId=id_message_display_frame&modal=true', '');
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2_modal";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close_modal";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close_modal";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
      else
      {
        scMsgDefClose = "close";
        $("#id_message_display_frame").css('top', (0 < iTop ? iTop + 'px' : ''));
        $("#id_message_display_frame").css('left', (0 < iLeft ? iLeft + 'px' : ''));
        document.getElementById("id_message_display_frame").style.display = "";
        if (0 == iTop && 0 == iLeft) {
          scCenterElement(document.getElementById("id_message_display_frame"));
        }
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
    }
  } // _scAjaxShowMessage

  function _scAjaxMessageBtnClose() {
    switch (scMsgDefClose) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function _scAjaxMessageBtnClick() {
    switch (scMsgDefClick) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
      case "redir1":
        document.form_ajax_redir_1.submit();
        break;
      case "redir2":
        document.form_ajax_redir_2.submit();
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "redir2_modal":
        document.form_ajax_redir_2.submit();
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"] || "SET" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxCalendarReload()
  {
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"])
    {
      self.parent.calendar_reload();
      self.parent.tb_remove();
    }
  } // scCalendarReload

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_form_tbl_georref" == sTestField)
        {
          if (ajax_error_geral != '') { ajax_error_geral += '<br>';}
          ajax_error_geral += scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (scFocusFirstErrorField && '' == scFocusFirstErrorName)
          {
            scFocusFirstErrorName = sTestField;
          }
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
        if (ajax_error_list[sField])
        {
        ajax_error_list[sField][sType] = aFieldErrors;
        }
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      if (ajax_error_list[sField])
      {
        for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
        {
          if (bLabel)
          {
            sErrorText += ajax_error_list[sField]["label"] + ": ";
          }
          sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
        }
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];
      if ("selectdd" == sFieldType)
      {
        var bSelectDD = true;
        sFieldType = "select";
      }
      else
      {
        var bSelectDD = false;
      }
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["row"])
      {
        var iRow = oResp["fldList"][iSetFields]["row"];
      }
      else
      {
        var iRow = 1;
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["keepImg"])
      {
        var sKeepImg = oResp["fldList"][iSetFields]["keepImg"];
      }
      else
      {
        var sKeepImg = "N";
      }
      if (oResp["fldList"][iSetFields]["hideName"])
      {
        var sHideName = oResp["fldList"][iSetFields]["hideName"];
      }
      else
      {
        var sHideName = "N";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }
      if (oResp["fldList"][iSetFields]["optComp"])
      {
        var sOptComp = oResp["fldList"][iSetFields]["optComp"];
      }
      else
      {
        var sOptComp = "";
      }
      if (oResp["fldList"][iSetFields]["optClass"])
      {
        var sOptClass = oResp["fldList"][iSetFields]["optClass"];
      }
      else
      {
        var sOptClass = "";
      }
      if (oResp["fldList"][iSetFields]["optMulti"])
      {
        var sOptMulti = oResp["fldList"][iSetFields]["optMulti"];
      }
      else
      {
        var sOptMulti = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["mulHtml"])
      {
        var sMULHtml = oResp["fldList"][iSetFields]["mulHtml"];
      }
      else
      {
        var sMULHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if (oResp["clearUpload"])
      {
        var sClearUpload = scAjaxSpecCharParser(oResp["clearUpload"]);
      }
      else
      {
        var sClearUpload = "N";
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, iRow);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      else if ("multi_upload" == sFieldType)
      {
        scAjaxSetFieldMultiUpload(sFieldName, sMULHtml);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons)
  {
    if (document.F1.elements[sFieldName])
    {
        var Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
        eval ("document.F1." + sFieldName + ".value = Temp_text");
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxBreakLine(oFieldValues[0]['value']));
    }
  } // scAjaxSetFieldText

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, iRow)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if (bSelectDD)
    {
        $("#id_sc_field_" + sFieldName).dropdownchecklist("destroy");
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues);
      return;
    }

    if (null != oFieldOptions)
    {
      $("#id_sc_field_" + sFieldName).children().remove()
      if ("<select" != oFieldOptions.substr(0, 7))
      {
        var $oField = $("#id_sc_field_" + sFieldName);
        if (0 < $oField.length)
        {
          $oField.html(oFieldOptions);
        }
        else
        {
          document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
        }
      }
      else
      {
        document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
      }
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = $("#id_sc_field_" + sFieldName);
    for (iFieldSelect = 0; iFieldSelect < oFormField[0].length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField[0].options[iFieldSelect].value, aValues))
      {
        oFormField[0].options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField[0].options[iFieldSelect].selected = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
    if (bSelectDD)
    {
        scJQDDCheckBoxAdd(iRow);
    }
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];

    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti)
  {
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearCheckbox(sFieldName);
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearCheckbox(sFieldName); */
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp)
  {
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues);
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearRadio(sFieldName);
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearRadio(sFieldName); */
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, "", "");
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldRadio

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    sFieldLabel = oFieldValues[0]["value"];
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if ("N" == sKeepImg && document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = scAjaxSpecCharParser(sImgFile);
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = scAjaxSpecCharParser(sImgLink);
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("N" == sKeepImg && document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"] || "S" == sHideName) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
      if (document.F1.elements["temp_out1_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgFile;
        document.F1.elements["temp_out1_" + sFieldName].value = sImgOrig;
      }
      else if (document.F1.elements["temp_out_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgOrig;
      }
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    else if (oResp && oResp["ajaxRequest"] && "navigate_form" == oResp["ajaxRequest"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = "";
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = scAjaxSpecCharParser(sDocLink);
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = scAjaxSpecCharParser(sDocIcon);
    }
    if ("" == oFieldValues[0]["value"])
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "none";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "none";
    }
    else
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("S" == sClearUpload && document.F1.elements[sFieldName + "_ul_name"])
    {
      document.F1.elements[sFieldName + "_ul_name"].value = "";
    }
    if ("" != sDocLink)
    {
      scAjaxSetReadonlyValue(sFieldName, sDocLink);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
    }
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldMultiUpload(sFieldName, sMULHtml)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    $("#id_sc_loaded_" + sFieldName).html(scAjaxSpecCharParser(sMULHtml));
  } // scAjaxSetFieldMultiUpload

  function scAjaxExecFieldEditorHtml(strOption, bolUI, oField)
  {
	  	if(tinymce.majorVersion > 3)
		{
			if(strOption == 'mceAddControl')
			{
				tinymce.execCommand('mceAddEditor', bolUI, oField);
			}else
			if(strOption == 'mceRemoveControl')
			{
				tinymce.execCommand('mceRemoveEditor', bolUI, oField);
			}
		}
		else
		{
			tinyMCE.execCommand(strOption, bolUI, oField);
		}
  }

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = scAjaxSpecCharParser(sImgHtml);
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, sReadLabel);
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    $oHidden = $("input[name=" + sFieldName + "]");
    if ($oHidden.length)
    {
      for (var i = 0; i < $oHidden.length; i++)
      {
        if ("hidden" == $oHidden[i].type && $oHidden[i].form && $oHidden[i].form.name && "F1" == $oHidden[i].form.name)
        {
          return scAjaxSpecCharProtect($oHidden[i].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    $oField = $("#id_sc_field_" + sFieldName);
    if ($oField.length && "select" != $oField[0].type.substr(0, 6))
    {
      return scAjaxSpecCharProtect($oField.val());//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return '';
    }
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    for( i= 0; i < document.F1.elements.length; i++)
    {
       if (document.F1.elements[i].name == sFieldName)
       {
          return scAjaxSpecCharProtect(document.F1.elements[i].value);//.replace(/[+]/g, "__NM_PLUS__");
       }
    }
//    return document.F1.elements[sFieldName].value.replace(/[+]/g, "__NM_PLUS__");
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return "";
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return scAjaxSpecCharProtect(oFormField.options[iSelected].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += scAjaxSpecCharProtect(oFormField[iFieldSelect].value);//.replace(/[+]/g, "__NM_PLUS__");
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += scAjaxSpecCharProtect(aValues[iFieldCheck]);//.replace(/[+]/g, "__NM_PLUS__");
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    if (!oFormField.length)
    {
        var sc_cmp_radio = eval("document.F1." + sFieldName);
        if (sc_cmp_radio.checked)
        {
           sValue = scAjaxSpecCharProtect(sc_cmp_radio.value);//.replace(/[+]/g, "__NM_PLUS__");
        }
    }
    else
    {
      for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
      {
        if (oFormField[iFieldRadio].checked)
        {
          sValue = scAjaxSpecCharProtect(oFormField[iFieldRadio].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }

        if(tinymce.majorVersion > 3)
        {
			var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
			var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    return scAjaxSpecCharParser(scAjaxSpecCharProtect(oFormField.getContent()));//.replace(/[+]/g, "__NM_PLUS__"));
  } // scAjaxGetFieldEditorHtml

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    if (null == sParseString) {
      return "";
    }
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } // scAjaxSpecCharParser

  function scAjaxSpecCharProtect(sOriginal)
  {
        var sProtected;
        sProtected = sOriginal.replace(/[+]/g, "__NM_PLUS__");
        sProtected = sProtected.replace(/[%]/g, "__NM_PERC__");
        return sProtected;
  } // scAjaxSpecCharProtect

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    var sClass;
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        if ("" != sOptClass)
        {
            sClass = " class=\"" + sOptClass;
            if ("" != sOptMulti)
            {
                sClass += " " + sOptClass + sOptMulti;
            }
            sClass += "\"";
        }
        if (sHtmComp == null)
        {
            sHtmComp = "";
        }
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
        sDivText += "<input type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + " " + sOptComp + sClass + ">";
        sDivText += sOptText;
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
  } // scAjaxRecreateOptions

  function scAjaxProcOn(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.blockUI && !bForce)
      {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else
      {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
        if (null != scCenterElement)
        {
          scCenterElement(document.getElementById("id_div_process"));
        }
      }
    }
  } // scAjaxProcOn

  function scAjaxProcOff(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.unblockUI && !bForce)
      {
        $.unblockUI();
      }
      else
      {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"] && '' == scFocusFirstErrorName)
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        scFocusField(sFieldName);
    }
    scAjaxFocusError();
  } // scAjaxSetFocus

  function scAjaxFocusError()
  {
    if ('' != scFocusFirstErrorName)
    {
      scFocusField(scFocusFirstErrorName);
      scFocusFirstErrorName = '';
    }
  } // scAjaxFocusError

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxSetSummary()
  {
    if (!oResp["navSummary"])
    {
      return;
    }
    sreg_ini = oResp["navSummary"].reg_ini;
    sreg_qtd = oResp["navSummary"].reg_qtd;
    sreg_tot = oResp["navSummary"].reg_tot;
    summary_atualiza(sreg_ini, sreg_qtd, sreg_tot);
  } // scAjaxSetSummary

  function scAjaxSetNavpage()
  {
    navpage_atualiza(oResp["navPage"]);
  } // scAjaxSetNavpage


  function scAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      if (oResp["redirInfo"]["target"] == "modal")
      {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&script_case_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
          }
        }
      }
    }
    if (oResp["buttonDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplay"].length; iDisplay++)
      {
        var sBtnName2 = "";
        switch (oResp["buttonDisplay"][iDisplay][0])
        {
          case "first": var sBtnName = "sc_b_ini"; break;
          case "back": var sBtnName = "sc_b_ret"; break;
          case "forward": var sBtnName = "sc_b_avc"; break;
          case "last": var sBtnName = "sc_b_fim"; break;
          case "insert": var sBtnName = "sc_b_ins"; break;
          case "update": var sBtnName = "sc_b_upd"; break;
          case "delete": var sBtnName = "sc_b_del"; break;
          default: var sBtnName = "sc_b_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName2 = "sc_" + oResp["buttonDisplay"][iDisplay][0]; break;
        }
        if ("sc_b_ini" == sBtnName || "sc_b_ret" == sBtnName || "sc_b_avc" == sBtnName || "sc_b_fim" == sBtnName)
        {
          scAjaxNavigateButtonDisplay(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
        }
        else
        {
          aDispData[aDispData.length] = new Array(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_t", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName + "_b", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName2)
        {
          aDispData[aDispData.length] = new Array(sBtnName2, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
  } // scAjaxSetDisplay

  function scAjaxNavigateButtonDisplay(sButton, sStatus)
  {
    sButton2 = sButton + "_off";

    if ("off" == sStatus)
    {
      sStatus2 = "off";
    }
    else
    {
      if ("sc_b_ini" == sButton || "sc_b_ret" == sButton)
      {
        if ("S" == Nav_permite_ret)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
      else
      {
        if ("S" == Nav_permite_ava)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
    }

    scAjaxElementDisplay(sButton        , sStatus);
    scAjaxElementDisplay(sButton + "_t" , sStatus);
    scAjaxElementDisplay(sButton + "_b" , sStatus);
    scAjaxElementDisplay(sButton2       , sStatus2);
    scAjaxElementDisplay(sButton2 + "_t", sStatus2);
    scAjaxElementDisplay(sButton2 + "_b", sStatus2);
  } // scAjaxNavigateButtonDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    sStyle = ("off" == sAction) ? "none" : "";
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {
      document.getElementById(sElement).style.display = sStyle;
      if (document.getElementById(sElement + "_dumb"))
      {
        document.getElementById(sElement + "_dumb").style.display = ("off" == sAction) ? "" : "none";
      }
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        if (ajax_field_list[iLabel] && ajax_error_list[ajax_field_list[iLabel]])
        {
          scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
        }
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], scAjaxSpecCharParser(oResp["fieldLabel"][iLabel][1]));
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField) && document.getElementById("id_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("id_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        if (ajax_read_only[ oResp["readOnly"][iRead][0] ])
        {
          scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
        }
        else if (oResp["rsSize"])
        {
          for (var i = 0; i <= oResp["rsSize"]; i++)
          {
            if (ajax_read_only[ oResp["readOnly"][iRead][0] + i ])
            {
              scAjaxFieldRead(oResp["readOnly"][iRead][0] + i, oResp["readOnly"][iRead][1]);
            }
          }
        }
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = scAjaxSpecCharParser('" + oResp["btnVars"][iBtn][1] + "');");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scAjaxJavascript()
  {
    if (oResp["ajaxJavascript"])
    {
      var sJsFunc = "";
      for (var i = 0; i < oResp["ajaxJavascript"].length; i++)
      {
        sJsFunc = scAjaxSpecCharParser(oResp["ajaxJavascript"][i][0]);
        if ("" != sJsFunc)
        {
          var aParam = new Array();
          if (oResp["ajaxJavascript"][i][1] && 0 < oResp["ajaxJavascript"][i][1].length)
          {
            for (var j = 0; j < oResp["ajaxJavascript"][i][1].length; j++)
            {
              aParam.push("'" + oResp["ajaxJavascript"][i][1][j] + "'");
            }
          }
          eval("if (" + sJsFunc + ") { " + sJsFunc + "(" + aParam.join(", ") + ") }");
        }
      }
    }
  } // scAjaxJavascript

  function scAjaxAlert()
  {
    if (oResp["ajaxAlert"] && oResp["ajaxAlert"]["message"] && "" != oResp["ajaxAlert"]["message"])
    {
      alert(oResp["ajaxAlert"]["message"]);
    }
  } // scAjaxAlert

  function scAjaxMessage(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["ajaxMessage"] && oResp["ajaxMessage"]["message"] && "" != oResp["ajaxMessage"]["message"])
    {
      var sTitle    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["title"])        ? oResp["ajaxMessage"]["title"]               : scMsgDefTitle,
          bModal    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["modal"])        ? ("Y" == oResp["ajaxMessage"]["modal"])      : false,
          iTimeout  = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["timeout"])      ? parseInt(oResp["ajaxMessage"]["timeout"])   : 0,
          bButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button"])       ? ("Y" == oResp["ajaxMessage"]["button"])     : false,
          sButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button_label"]) ? oResp["ajaxMessage"]["button_label"]        : "Ok",
          iTop      = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["top"])          ? parseInt(oResp["ajaxMessage"]["top"])       : 0,
          iLeft     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["left"])         ? parseInt(oResp["ajaxMessage"]["left"])      : 0,
          iWidth    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["width"])        ? parseInt(oResp["ajaxMessage"]["width"])     : 0,
          iHeight   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["height"])       ? parseInt(oResp["ajaxMessage"]["height"])    : 0,
          bClose    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["show_close"])   ? ("Y" == oResp["ajaxMessage"]["show_close"]) : true,
          bBodyIcon = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["body_icon"])    ? ("Y" == oResp["ajaxMessage"]["body_icon"])  : true,
          sRedir    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir"])        ? oResp["ajaxMessage"]["redir"]               : "",
          sTarget   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_target"]) ? oResp["ajaxMessage"]["redir_target"]        : "",
          sParam    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_par"])    ? oResp["ajaxMessage"]["redir_par"]           : "";
      _scAjaxShowMessage(sTitle, oResp["ajaxMessage"]["message"], bModal, iTimeout, bButton, sButton, iTop, iLeft, iWidth, iHeight, sRedir, sTarget, sParam, bClose, bBodyIcon);
    }
  } // scAjaxAlert

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      input += "";
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      var input1 = input + "";
      while (input1.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input1 = input1.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input1;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine


  // ---------- Validate id_
  function do_ajax_form_tbl_georref_validate_id_(iNumLinha)
  {
    var nomeCampo_id_ = "id_" + iNumLinha;
    var var_id_ = scAjaxGetFieldHidden(nomeCampo_id_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_id_(var_id_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_id__cb);
  } // do_ajax_form_tbl_georref_validate_id_

  function do_ajax_form_tbl_georref_validate_id__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_id__cb

  // ---------- Validate sc_field_0_
  function do_ajax_form_tbl_georref_validate_sc_field_0_(iNumLinha)
  {
    var nomeCampo_sc_field_0_ = "sc_field_0_" + iNumLinha;
    var var_sc_field_0_ = scAjaxGetFieldText(nomeCampo_sc_field_0_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_0_(var_sc_field_0_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_0__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_0_

  function do_ajax_form_tbl_georref_validate_sc_field_0__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_0_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_0_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_0_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_0_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_0__cb

  // ---------- Validate sc_field_1_
  function do_ajax_form_tbl_georref_validate_sc_field_1_(iNumLinha)
  {
    var nomeCampo_sc_field_1_ = "sc_field_1_" + iNumLinha;
    var var_sc_field_1_ = scAjaxGetFieldText(nomeCampo_sc_field_1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_1_(var_sc_field_1_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_1__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_1_

  function do_ajax_form_tbl_georref_validate_sc_field_1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_1_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_1_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_1_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_1__cb

  // ---------- Validate comuna_
  function do_ajax_form_tbl_georref_validate_comuna_(iNumLinha)
  {
    var nomeCampo_comuna_ = "comuna_" + iNumLinha;
    var var_comuna_ = scAjaxGetFieldText(nomeCampo_comuna_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_comuna_(var_comuna_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_comuna__cb);
  } // do_ajax_form_tbl_georref_validate_comuna_

  function do_ajax_form_tbl_georref_validate_comuna__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "comuna_" + iLineNumber;
    }
    else
    {
      sFieldValid = "comuna_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "comuna_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "comuna_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_comuna__cb

  // ---------- Validate sc_field_2_
  function do_ajax_form_tbl_georref_validate_sc_field_2_(iNumLinha)
  {
    var nomeCampo_sc_field_2_ = "sc_field_2_" + iNumLinha;
    var var_sc_field_2_ = scAjaxGetFieldText(nomeCampo_sc_field_2_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_2_(var_sc_field_2_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_2__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_2_

  function do_ajax_form_tbl_georref_validate_sc_field_2__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_2_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_2_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_2_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_2_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_2__cb

  // ---------- Validate sc_field_3_
  function do_ajax_form_tbl_georref_validate_sc_field_3_(iNumLinha)
  {
    var nomeCampo_sc_field_3_ = "sc_field_3_" + iNumLinha;
    var var_sc_field_3_ = scAjaxGetFieldText(nomeCampo_sc_field_3_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_3_(var_sc_field_3_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_3__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_3_

  function do_ajax_form_tbl_georref_validate_sc_field_3__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_3_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_3_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_3_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_3_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_3__cb

  // ---------- Validate agenda_
  function do_ajax_form_tbl_georref_validate_agenda_(iNumLinha)
  {
    var nomeCampo_agenda_ = "agenda_" + iNumLinha;
    var var_agenda_ = scAjaxGetFieldText(nomeCampo_agenda_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_agenda_(var_agenda_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_agenda__cb);
  } // do_ajax_form_tbl_georref_validate_agenda_

  function do_ajax_form_tbl_georref_validate_agenda__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "agenda_" + iLineNumber;
    }
    else
    {
      sFieldValid = "agenda_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "agenda_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "agenda_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_agenda__cb

  // ---------- Validate rce_
  function do_ajax_form_tbl_georref_validate_rce_(iNumLinha)
  {
    var nomeCampo_rce_ = "rce_" + iNumLinha;
    var var_rce_ = scAjaxGetFieldText(nomeCampo_rce_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_rce_(var_rce_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_rce__cb);
  } // do_ajax_form_tbl_georref_validate_rce_

  function do_ajax_form_tbl_georref_validate_rce__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "rce_" + iLineNumber;
    }
    else
    {
      sFieldValid = "rce_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "rce_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "rce_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_rce__cb

  // ---------- Validate indicaciones_
  function do_ajax_form_tbl_georref_validate_indicaciones_(iNumLinha)
  {
    var nomeCampo_indicaciones_ = "indicaciones_" + iNumLinha;
    var var_indicaciones_ = scAjaxGetFieldText(nomeCampo_indicaciones_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_indicaciones_(var_indicaciones_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_indicaciones__cb);
  } // do_ajax_form_tbl_georref_validate_indicaciones_

  function do_ajax_form_tbl_georref_validate_indicaciones__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "indicaciones_" + iLineNumber;
    }
    else
    {
      sFieldValid = "indicaciones_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "indicaciones_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "indicaciones_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_indicaciones__cb

  // ---------- Validate dental_
  function do_ajax_form_tbl_georref_validate_dental_(iNumLinha)
  {
    var nomeCampo_dental_ = "dental_" + iNumLinha;
    var var_dental_ = scAjaxGetFieldText(nomeCampo_dental_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_dental_(var_dental_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_dental__cb);
  } // do_ajax_form_tbl_georref_validate_dental_

  function do_ajax_form_tbl_georref_validate_dental__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dental_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dental_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dental_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dental_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_dental__cb

  // ---------- Validate sc_field_4_
  function do_ajax_form_tbl_georref_validate_sc_field_4_(iNumLinha)
  {
    var nomeCampo_sc_field_4_ = "sc_field_4_" + iNumLinha;
    var var_sc_field_4_ = scAjaxGetFieldText(nomeCampo_sc_field_4_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_4_(var_sc_field_4_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_4__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_4_

  function do_ajax_form_tbl_georref_validate_sc_field_4__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_4_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_4_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_4_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_4_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_4__cb

  // ---------- Validate sc_field_5_
  function do_ajax_form_tbl_georref_validate_sc_field_5_(iNumLinha)
  {
    var nomeCampo_sc_field_5_ = "sc_field_5_" + iNumLinha;
    var var_sc_field_5_ = scAjaxGetFieldText(nomeCampo_sc_field_5_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_5_(var_sc_field_5_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_5__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_5_

  function do_ajax_form_tbl_georref_validate_sc_field_5__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_5_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_5_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_5_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_5_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_5__cb

  // ---------- Validate rce_1_
  function do_ajax_form_tbl_georref_validate_rce_1_(iNumLinha)
  {
    var nomeCampo_rce_1_ = "rce_1_" + iNumLinha;
    var var_rce_1_ = scAjaxGetFieldText(nomeCampo_rce_1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_rce_1_(var_rce_1_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_rce_1__cb);
  } // do_ajax_form_tbl_georref_validate_rce_1_

  function do_ajax_form_tbl_georref_validate_rce_1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "rce_1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "rce_1_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "rce_1_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "rce_1_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_rce_1__cb

  // ---------- Validate indicaciones_1_
  function do_ajax_form_tbl_georref_validate_indicaciones_1_(iNumLinha)
  {
    var nomeCampo_indicaciones_1_ = "indicaciones_1_" + iNumLinha;
    var var_indicaciones_1_ = scAjaxGetFieldText(nomeCampo_indicaciones_1_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_indicaciones_1_(var_indicaciones_1_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_indicaciones_1__cb);
  } // do_ajax_form_tbl_georref_validate_indicaciones_1_

  function do_ajax_form_tbl_georref_validate_indicaciones_1__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "indicaciones_1_" + iLineNumber;
    }
    else
    {
      sFieldValid = "indicaciones_1_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "indicaciones_1_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "indicaciones_1_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_indicaciones_1__cb

  // ---------- Validate sc_field_6_
  function do_ajax_form_tbl_georref_validate_sc_field_6_(iNumLinha)
  {
    var nomeCampo_sc_field_6_ = "sc_field_6_" + iNumLinha;
    var var_sc_field_6_ = scAjaxGetFieldText(nomeCampo_sc_field_6_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_6_(var_sc_field_6_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_6__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_6_

  function do_ajax_form_tbl_georref_validate_sc_field_6__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_6_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_6_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_6_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_6_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_6__cb

  // ---------- Validate rce_2_
  function do_ajax_form_tbl_georref_validate_rce_2_(iNumLinha)
  {
    var nomeCampo_rce_2_ = "rce_2_" + iNumLinha;
    var var_rce_2_ = scAjaxGetFieldText(nomeCampo_rce_2_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_rce_2_(var_rce_2_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_rce_2__cb);
  } // do_ajax_form_tbl_georref_validate_rce_2_

  function do_ajax_form_tbl_georref_validate_rce_2__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "rce_2_" + iLineNumber;
    }
    else
    {
      sFieldValid = "rce_2_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "rce_2_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "rce_2_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_rce_2__cb

  // ---------- Validate indicaciones_2_
  function do_ajax_form_tbl_georref_validate_indicaciones_2_(iNumLinha)
  {
    var nomeCampo_indicaciones_2_ = "indicaciones_2_" + iNumLinha;
    var var_indicaciones_2_ = scAjaxGetFieldText(nomeCampo_indicaciones_2_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_indicaciones_2_(var_indicaciones_2_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_indicaciones_2__cb);
  } // do_ajax_form_tbl_georref_validate_indicaciones_2_

  function do_ajax_form_tbl_georref_validate_indicaciones_2__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "indicaciones_2_" + iLineNumber;
    }
    else
    {
      sFieldValid = "indicaciones_2_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "indicaciones_2_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "indicaciones_2_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_indicaciones_2__cb

  // ---------- Validate triage_
  function do_ajax_form_tbl_georref_validate_triage_(iNumLinha)
  {
    var nomeCampo_triage_ = "triage_" + iNumLinha;
    var var_triage_ = scAjaxGetFieldText(nomeCampo_triage_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_triage_(var_triage_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_triage__cb);
  } // do_ajax_form_tbl_georref_validate_triage_

  function do_ajax_form_tbl_georref_validate_triage__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "triage_" + iLineNumber;
    }
    else
    {
      sFieldValid = "triage_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "triage_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "triage_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_triage__cb

  // ---------- Validate sc_field_7_
  function do_ajax_form_tbl_georref_validate_sc_field_7_(iNumLinha)
  {
    var nomeCampo_sc_field_7_ = "sc_field_7_" + iNumLinha;
    var var_sc_field_7_ = scAjaxGetFieldText(nomeCampo_sc_field_7_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_7_(var_sc_field_7_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_7__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_7_

  function do_ajax_form_tbl_georref_validate_sc_field_7__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_7_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_7_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_7_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_7_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_7__cb

  // ---------- Validate sc_field_8_
  function do_ajax_form_tbl_georref_validate_sc_field_8_(iNumLinha)
  {
    var nomeCampo_sc_field_8_ = "sc_field_8_" + iNumLinha;
    var var_sc_field_8_ = scAjaxGetFieldText(nomeCampo_sc_field_8_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_8_(var_sc_field_8_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_8__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_8_

  function do_ajax_form_tbl_georref_validate_sc_field_8__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_8_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_8_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_8_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_8_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_8__cb

  // ---------- Validate sc_field_9_
  function do_ajax_form_tbl_georref_validate_sc_field_9_(iNumLinha)
  {
    var nomeCampo_sc_field_9_ = "sc_field_9_" + iNumLinha;
    var var_sc_field_9_ = scAjaxGetFieldText(nomeCampo_sc_field_9_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_9_(var_sc_field_9_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_9__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_9_

  function do_ajax_form_tbl_georref_validate_sc_field_9__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_9_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_9_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_9_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_9_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_9__cb

  // ---------- Validate dispensacion_
  function do_ajax_form_tbl_georref_validate_dispensacion_(iNumLinha)
  {
    var nomeCampo_dispensacion_ = "dispensacion_" + iNumLinha;
    var var_dispensacion_ = scAjaxGetFieldText(nomeCampo_dispensacion_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_dispensacion_(var_dispensacion_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_dispensacion__cb);
  } // do_ajax_form_tbl_georref_validate_dispensacion_

  function do_ajax_form_tbl_georref_validate_dispensacion__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "dispensacion_" + iLineNumber;
    }
    else
    {
      sFieldValid = "dispensacion_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "dispensacion_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "dispensacion_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_dispensacion__cb

  // ---------- Validate sc_field_10_
  function do_ajax_form_tbl_georref_validate_sc_field_10_(iNumLinha)
  {
    var nomeCampo_sc_field_10_ = "sc_field_10_" + iNumLinha;
    var var_sc_field_10_ = scAjaxGetFieldText(nomeCampo_sc_field_10_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_10_(var_sc_field_10_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_10__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_10_

  function do_ajax_form_tbl_georref_validate_sc_field_10__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_10_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_10_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_10_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_10_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_10__cb

  // ---------- Validate laboratorio_
  function do_ajax_form_tbl_georref_validate_laboratorio_(iNumLinha)
  {
    var nomeCampo_laboratorio_ = "laboratorio_" + iNumLinha;
    var var_laboratorio_ = scAjaxGetFieldText(nomeCampo_laboratorio_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_laboratorio_(var_laboratorio_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_laboratorio__cb);
  } // do_ajax_form_tbl_georref_validate_laboratorio_

  function do_ajax_form_tbl_georref_validate_laboratorio__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "laboratorio_" + iLineNumber;
    }
    else
    {
      sFieldValid = "laboratorio_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "laboratorio_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "laboratorio_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_laboratorio__cb

  // ---------- Validate sc_field_11_
  function do_ajax_form_tbl_georref_validate_sc_field_11_(iNumLinha)
  {
    var nomeCampo_sc_field_11_ = "sc_field_11_" + iNumLinha;
    var var_sc_field_11_ = scAjaxGetFieldText(nomeCampo_sc_field_11_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_11_(var_sc_field_11_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_11__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_11_

  function do_ajax_form_tbl_georref_validate_sc_field_11__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_11_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_11_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_11_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_11_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_11__cb

  // ---------- Validate sc_field_12_
  function do_ajax_form_tbl_georref_validate_sc_field_12_(iNumLinha)
  {
    var nomeCampo_sc_field_12_ = "sc_field_12_" + iNumLinha;
    var var_sc_field_12_ = scAjaxGetFieldText(nomeCampo_sc_field_12_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_sc_field_12_(var_sc_field_12_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_sc_field_12__cb);
  } // do_ajax_form_tbl_georref_validate_sc_field_12_

  function do_ajax_form_tbl_georref_validate_sc_field_12__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "sc_field_12_" + iLineNumber;
    }
    else
    {
      sFieldValid = "sc_field_12_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "sc_field_12_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "sc_field_12_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_sc_field_12__cb

  // ---------- Validate erp_
  function do_ajax_form_tbl_georref_validate_erp_(iNumLinha)
  {
    var nomeCampo_erp_ = "erp_" + iNumLinha;
    var var_erp_ = scAjaxGetFieldText(nomeCampo_erp_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_erp_(var_erp_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_erp__cb);
  } // do_ajax_form_tbl_georref_validate_erp_

  function do_ajax_form_tbl_georref_validate_erp__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "erp_" + iLineNumber;
    }
    else
    {
      sFieldValid = "erp_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "erp_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "erp_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_erp__cb

  // ---------- Validate pabellon_
  function do_ajax_form_tbl_georref_validate_pabellon_(iNumLinha)
  {
    var nomeCampo_pabellon_ = "pabellon_" + iNumLinha;
    var var_pabellon_ = scAjaxGetFieldText(nomeCampo_pabellon_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_pabellon_(var_pabellon_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_pabellon__cb);
  } // do_ajax_form_tbl_georref_validate_pabellon_

  function do_ajax_form_tbl_georref_validate_pabellon__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "pabellon_" + iLineNumber;
    }
    else
    {
      sFieldValid = "pabellon_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "pabellon_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "pabellon_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_pabellon__cb

  // ---------- Validate maternidad_
  function do_ajax_form_tbl_georref_validate_maternidad_(iNumLinha)
  {
    var nomeCampo_maternidad_ = "maternidad_" + iNumLinha;
    var var_maternidad_ = scAjaxGetFieldText(nomeCampo_maternidad_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_maternidad_(var_maternidad_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_maternidad__cb);
  } // do_ajax_form_tbl_georref_validate_maternidad_

  function do_ajax_form_tbl_georref_validate_maternidad__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "maternidad_" + iLineNumber;
    }
    else
    {
      sFieldValid = "maternidad_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "maternidad_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "maternidad_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_maternidad__cb

  // ---------- Validate archivo_
  function do_ajax_form_tbl_georref_validate_archivo_(iNumLinha)
  {
    var nomeCampo_archivo_ = "archivo_" + iNumLinha;
    var var_archivo_ = scAjaxGetFieldText(nomeCampo_archivo_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_archivo_(var_archivo_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_archivo__cb);
  } // do_ajax_form_tbl_georref_validate_archivo_

  function do_ajax_form_tbl_georref_validate_archivo__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "archivo_" + iLineNumber;
    }
    else
    {
      sFieldValid = "archivo_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "archivo_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "archivo_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_archivo__cb

  // ---------- Validate lme_
  function do_ajax_form_tbl_georref_validate_lme_(iNumLinha)
  {
    var nomeCampo_lme_ = "lme_" + iNumLinha;
    var var_lme_ = scAjaxGetFieldText(nomeCampo_lme_);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_validate_lme_(var_lme_, iNumLinha, var_script_case_init, do_ajax_form_tbl_georref_validate_lme__cb);
  } // do_ajax_form_tbl_georref_validate_lme_

  function do_ajax_form_tbl_georref_validate_lme__cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "lme_" + iLineNumber;
    }
    else
    {
      sFieldValid = "lme_";
    }
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "lme_");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "lme_");
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_tbl_georref_validate_lme__cb

  // ---------- Event onclick scajaxbutton_volver
  function do_ajax_form_tbl_georref_event_scajaxbutton_volver_onclick(iSeqForm)
  {
    var var_script_case_init = document.F2.script_case_init.value;
    var var_nmgp_refresh_row = iSeqForm;
    scAjaxProcOn(true);
    x_ajax_form_tbl_georref_event_scajaxbutton_volver_onclick(var_script_case_init, var_nmgp_refresh_row, do_ajax_form_tbl_georref_event_scajaxbutton_volver_onclick_cb);
  } // do_ajax_form_tbl_georref_event_scajaxbutton_volver_onclick

  function do_ajax_form_tbl_georref_event_scajaxbutton_volver_onclick_cb(sResp)
  {
    scAjaxProcOff(true);
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "scajaxbutton_volver" + iLineNumber;
    }
    else
    {
      sFieldValid = "scajaxbutton_volver";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "onclick");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "scajaxbutton_volver");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "scajaxbutton_volver");
    }
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_form_tbl_georref_event_scajaxbutton_volver_onclick_cb

  var sc_num_ult_line = "";
  var sc_insert_open  = false;

  // ---------- add_new_line
  function do_ajax_form_tbl_georref_add_new_line(sc_clone, sc_seq_clone)
  {
    if (sc_insert_open)
    {
        if (sc_clone == 'S' && sc_seq_clone != iAjaxNewLine)
        {
          do_ajax_form_tbl_georref_cancel_insert(iAjaxNewLine);
        }
        else
        {
          return;
        }
    }
    sc_insert_open = true;
    scDisableNavigation();
    sc_num_ult_line = iAjaxNewLine + 1;
    if (sc_clone == 'S')
    {
      var var_sc_clone     = sc_clone;
      var var_sc_seq_clone = sc_seq_clone;
    }
    else
    {
      var var_sc_clone     = 'N';
      var var_sc_seq_clone = '';
    }
    var var_sc_seq_vert = document.F1.sc_contr_vert.value;
    var var_script_case_init = document.F1.script_case_init.value;
    scAjaxProcOn(true);
    x_ajax_form_tbl_georref_add_new_line(var_sc_clone, var_sc_seq_clone, var_sc_seq_vert, var_script_case_init, do_ajax_form_tbl_georref_add_new_line_cb);
  } // do_ajax_form_tbl_georref_add_new_line

  function do_ajax_form_tbl_georref_add_new_line_cb(sResp)
  {
    scAjaxProcOff(true);
    var sv_quot = sResp.replace(/&quot;/g, "_nm__asp_");
    sv_quot = scAjaxSpecCharParser(sv_quot);
    document.getElementById("new_line_dummy").innerHTML = "<table id=\"new_line_table\">" + sv_quot.replace(/_nm__asp_/g, "&quot;") + "</table>";
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTBodyNew = document.getElementById("new_line_table").tBodies[0];
    var oTRNewLine = oTBodyNew.rows[0];
    oTBodyOld.appendChild(oTRNewLine);
    ajax_create_tables(document.F1.sc_contr_vert.value);
    iAjaxNewLine = document.F1.sc_contr_vert.value;
    document.F1.sc_contr_vert.value++;
    scJQElementsAdd(iAjaxNewLine);
    if (document.getElementById("sc_clone_line_" + iAjaxNewLine))
        document.getElementById("sc_clone_line_" + iAjaxNewLine).style.display = "none";
    $('#idVertRow' + iAjaxNewLine + ' input:text.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' input:password.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' input:checkbox.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' input:radio.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' select.sc-js-input').listen();
    $('#idVertRow' + iAjaxNewLine + ' textarea.sc-js-input').listen();
  } // do_ajax_form_tbl_georref_add_new_line_cb

  // ---------- backup_line
  function do_ajax_form_tbl_georref_backup_line(iNumLinha)
  {
    var var_id_ = scAjaxGetFieldHidden("id_" + iNumLinha);
    var var_nmgp_refresh_row = iNumLinha;
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_tbl_georref_backup_line(var_id_, var_nmgp_refresh_row, var_nm_form_submit, var_script_case_init, do_ajax_form_tbl_georref_backup_line_cb);
  } // do_ajax_form_tbl_georref_backup_line

  function do_ajax_form_tbl_georref_backup_line_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
  } // do_ajax_form_tbl_georref_backup_line_cb

  function do_ajax_form_tbl_georref_cancel_insert(iSeqVert)
  {
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTROldLine = oTBodyOld.rows[oTBodyOld.rows.length - 1];
    oTBodyOld.removeChild(oTROldLine);
    ajax_destroy_tables(iSeqVert);
    scEnableNavigation();
    sc_insert_open = false;
    scAjaxHideErrorDisplay("table");
  } // do_ajax_form_tbl_georref_cancel_insert

  function do_ajax_form_tbl_georref_cancel_update(iSeqVert)
  {
    do_ajax_form_tbl_georref_backup_line(iSeqVert);
    scErrorLineOff(iSeqVert, "__sc_all__");
    scAjaxHideErrorDisplay("table");
<?php
    if ($this->Embutida_ronly)
    {
?>
    mdCloseObjects(iSeqVert);
    if (document.getElementById("sc_exc_line_" + iSeqVert))
      document.getElementById("sc_exc_line_" + iSeqVert).style.display = "";
    if (document.getElementById("sc_open_line_" + iSeqVert))
      document.getElementById("sc_open_line_" + iSeqVert).style.display = "";
    if (document.getElementById("sc_upd_line_" + iSeqVert))
      document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
    if (document.getElementById("sc_cancelu_line_" + iSeqVert))
      document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
<?php
    }
?>
  } // do_ajax_form_tbl_georref_cancel_update

  function do_ajax_form_tbl_georref_restore_buttons()
  {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
?>
    for (iSeqVert = 1; iSeqVert <= <?php echo $this->sc_max_reg; ?>; iSeqVert++)
    {
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
      if (document.getElementById("sc_exc_line_" + iSeqVert))
        document.getElementById("sc_exc_line_" + iSeqVert).style.display = "";
<?php
    }
?>
      if (document.getElementById("sc_open_line_" + iSeqVert))
        document.getElementById("sc_open_line_" + iSeqVert).style.display = "";
      if (document.getElementById("sc_ins_line_" + iSeqVert))
        document.getElementById("sc_ins_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_upd_line_" + iSeqVert))
        document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_new_line_" + iSeqVert))
        document.getElementById("sc_new_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_canceli_line_" + iSeqVert))
        document.getElementById("sc_canceli_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_cancelu_line_" + iSeqVert))
        document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
    }
<?php
    }
?>
  } // do_ajax_form_tbl_georref_restore_buttons

  // ---------- table_refresh
  function do_ajax_form_tbl_georref_table_refresh()
  {
    var var_id_ = document.F2.id_.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_tbl_georref_table_refresh(var_id_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search, var_nmgp_cond_fast_search, var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_tbl_georref_table_refresh_cb);
  } //  do_ajax_form_tbl_georref_table_refresh

  function do_ajax_form_tbl_georref_table_refresh_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    if ("ERROR" == oResp.result)
    {
        scAjaxShowErrorDisplay("table", oResp.errList[0].msgText);
        scAjaxProcOff();
        return;
    }
    if (oResp["rsSize"] < <?php echo $this->sc_max_reg; ?>)
    {
       bRefreshTable = true;
    }
    if (oResp["navSummary"].reg_tot == 0)
    {
       $("#sc-ui-empty-form").show();
    }
    else
    {
       $("#sc-ui-empty-form").hide();
    }
    document.F2.id_.value = scAjaxGetKeyValue("id_");
    for (i = 1; i < <?php echo $this->sc_max_reg + 1; ?> ; i++)
    {
    }
    var sv_quot = oResp["tableRefresh"].replace(/&quot;/g, "_nm__asp_");
    sv_quot = scAjaxSpecCharParser(sv_quot);
    document.getElementById("SC_tab_mult_reg").innerHTML = sv_quot.replace(/_nm__asp_/g, "&quot;");
    for (i = 1; i < <?php echo $this->sc_max_reg + 1; ?> ; i++)
    {
    }
    document.F1.sc_contr_vert.value = parseInt(oResp["rsSize"]) + 1;
    iAjaxNewLine = oResp["rsSize"];
    var iAjaxNewLine = <?php echo $this->sc_max_reg + 1; ?>;
    for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
         scJQElementsAdd(iLine);
    }
    scJQGeneralAdd();
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scQSInit = true;
    scQSInitVal = $("#SC_fast_search_t").val();
    scQuickSearchKeyUp('t', null);
    $('#SC_fast_search_t').blur();
    scQuickSearchInit(true, '');
    scQSInit = false;
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    sc_insert_open = false;
  } // do_ajax_form_tbl_georref_table_refresh_cb

  // ---------- Form
  var sc_num_ult_line = "";
  var sc_num_ult_opc  = "";
  var sc_num_ult_tr   = "";
  function do_ajax_form_tbl_georref_submit_form(iNumLinha, indexTR)
  {
    if (scEventControl_active(iNumLinha)) {
      setTimeout(function() { do_ajax_form_tbl_georref_submit_form(iNumLinha, indexTR); }, 500);
      return;
    }
    sc_num_ult_line = iNumLinha;
    sc_num_ult_tr   = indexTR;
    scAjaxHideMessage();
    var var_id_ = scAjaxGetFieldHidden("id_" + iNumLinha);
    var var_sc_field_0_ = scAjaxGetFieldText("sc_field_0_" + iNumLinha);
    var var_sc_field_1_ = scAjaxGetFieldText("sc_field_1_" + iNumLinha);
    var var_comuna_ = scAjaxGetFieldText("comuna_" + iNumLinha);
    var var_sc_field_2_ = scAjaxGetFieldText("sc_field_2_" + iNumLinha);
    var var_sc_field_3_ = scAjaxGetFieldText("sc_field_3_" + iNumLinha);
    var var_agenda_ = scAjaxGetFieldText("agenda_" + iNumLinha);
    var var_rce_ = scAjaxGetFieldText("rce_" + iNumLinha);
    var var_indicaciones_ = scAjaxGetFieldText("indicaciones_" + iNumLinha);
    var var_dental_ = scAjaxGetFieldText("dental_" + iNumLinha);
    var var_sc_field_4_ = scAjaxGetFieldText("sc_field_4_" + iNumLinha);
    var var_sc_field_5_ = scAjaxGetFieldText("sc_field_5_" + iNumLinha);
    var var_rce_1_ = scAjaxGetFieldText("rce_1_" + iNumLinha);
    var var_indicaciones_1_ = scAjaxGetFieldText("indicaciones_1_" + iNumLinha);
    var var_sc_field_6_ = scAjaxGetFieldText("sc_field_6_" + iNumLinha);
    var var_rce_2_ = scAjaxGetFieldText("rce_2_" + iNumLinha);
    var var_indicaciones_2_ = scAjaxGetFieldText("indicaciones_2_" + iNumLinha);
    var var_triage_ = scAjaxGetFieldText("triage_" + iNumLinha);
    var var_sc_field_7_ = scAjaxGetFieldText("sc_field_7_" + iNumLinha);
    var var_sc_field_8_ = scAjaxGetFieldText("sc_field_8_" + iNumLinha);
    var var_sc_field_9_ = scAjaxGetFieldText("sc_field_9_" + iNumLinha);
    var var_dispensacion_ = scAjaxGetFieldText("dispensacion_" + iNumLinha);
    var var_sc_field_10_ = scAjaxGetFieldText("sc_field_10_" + iNumLinha);
    var var_laboratorio_ = scAjaxGetFieldText("laboratorio_" + iNumLinha);
    var var_sc_field_11_ = scAjaxGetFieldText("sc_field_11_" + iNumLinha);
    var var_sc_field_12_ = scAjaxGetFieldText("sc_field_12_" + iNumLinha);
    var var_erp_ = scAjaxGetFieldText("erp_" + iNumLinha);
    var var_pabellon_ = scAjaxGetFieldText("pabellon_" + iNumLinha);
    var var_maternidad_ = scAjaxGetFieldText("maternidad_" + iNumLinha);
    var var_archivo_ = scAjaxGetFieldText("archivo_" + iNumLinha);
    var var_lme_ = scAjaxGetFieldText("lme_" + iNumLinha);
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = "Sc_num_lin_alt?#?" + iNumLinha + "?@?" +  document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    var var_nmgp_refresh_row = iNumLinha;
<?php
    }
    else
    {
?>
    var var_nmgp_refresh_row = "";
<?php
    }
?>
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    sc_num_ult_opc = var_nmgp_opcao;
    scAjaxProcOn();
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    scRemoveErrors();
<?php
    }
?>
    x_ajax_form_tbl_georref_submit_form(var_id_, var_sc_field_0_, var_sc_field_1_, var_comuna_, var_sc_field_2_, var_sc_field_3_, var_agenda_, var_rce_, var_indicaciones_, var_dental_, var_sc_field_4_, var_sc_field_5_, var_rce_1_, var_indicaciones_1_, var_sc_field_6_, var_rce_2_, var_indicaciones_2_, var_triage_, var_sc_field_7_, var_sc_field_8_, var_sc_field_9_, var_dispensacion_, var_sc_field_10_, var_laboratorio_, var_sc_field_11_, var_sc_field_12_, var_erp_, var_pabellon_, var_maternidad_, var_archivo_, var_lme_, var_nmgp_refresh_row, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_tbl_georref_submit_form_cb);
  } // do_ajax_form_tbl_georref_submit_form

  function do_ajax_form_tbl_georref_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxCalendarReload();
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
      scErrorLineOff(sc_num_ult_line, "__sc_all__");
    }
    else
    {
      scAjaxShowErrorDisplay("table", sAppErrors);
      scErrorLineOn(sc_num_ult_line, "__sc_all__");
    }
    if (!scAjaxHasError())
    {
      if (sc_num_ult_opc == 'incluir')
      {
         bRefreshTable = true;
         if (document.getElementById("sc_ins_line_" + sc_num_ult_line))
           document.getElementById("sc_ins_line_" + sc_num_ult_line).style.display = "none";
         if (document.getElementById("sc_upd_line_" + sc_num_ult_line))
           document.getElementById("sc_upd_line_" + sc_num_ult_line).style.display = "";
         if (document.getElementById("sc_clone_line_" + sc_num_ult_line))
           document.getElementById("sc_clone_line_" + sc_num_ult_line).style.display = "";
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
    }
?>
         if (document.getElementById("sc_new_line_" + sc_num_ult_line))
           document.getElementById("sc_new_line_" + sc_num_ult_line).style.display = "none";
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
         if (document.getElementById("sc_canceli_line_" + sc_num_ult_line))
           document.getElementById("sc_canceli_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
         sc_insert_open = false;
         scEnableNavigation();
         do_ajax_form_tbl_georref_add_new_line();
         $("#sc-ui-empty-form").hide();
      }
      if (sc_num_ult_opc == 'alterar')
      {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
       if ($this->nmgp_botoes['delete'] == 'on')
       {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
       }
?>
         if (document.getElementById("sc_cancelu_line_" + sc_num_ult_line))
           document.getElementById("sc_cancelu_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
      }
      if (sc_num_ult_opc == 'excluir')
      {
         bRefreshTable = true;
         sc_name_table = document.getElementById("hidden_bloco_0");
         sc_name_table.deleteRow(sc_num_ult_tr);
         sc_num_ult_line = sc_name_table.rows.length - 1;
         if (0 == sc_num_ult_line || (1 == sc_num_ult_line && sc_insert_open))
         {
            $("#sc-ui-empty-form").show();
         }
      }
      scAjaxShowMessage();
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("id_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_0_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_1_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("comuna_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_2_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_3_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("agenda_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("rce_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("indicaciones_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dental_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_4_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_5_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("rce_1_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("indicaciones_1_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_6_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("rce_2_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("indicaciones_2_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("triage_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_7_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_8_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_9_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("dispensacion_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_10_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("laboratorio_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_11_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("sc_field_12_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("erp_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("pabellon_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("maternidad_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("archivo_" + sc_num_ult_line);
      scAjaxHideErrorDisplay("lme_" + sc_num_ult_line);
<?php
if (isset($this->Embutida_form) && $this->Embutida_form) {
?>
      scAjaxSetFields();
      scAjaxSetReadonly();
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly) {
?>
      mdCloseLine();
<?php
    }
} else {
?>
      scAjaxSetReadonly(true);
<?php
}
?>
      scLigEditLookupCall();
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      if (sc_closeChange && self.parent && self.parent.tb_remove)
      {
        self.parent.tb_remove();
      }
      scAjaxSetFields();
      if (sc_num_ult_opc == 'alterar' || sc_num_ult_opc == 'incluir')
      {
<?php
        if (isset($this->Embutida_form) && $this->Embutida_form)
        {
?>
<?php
        }
?>
      }
    }
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetDisplay(true);
    scAjaxSetLabel(true);
    scAjaxSetMaster();
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_tbl_georref_submit_form_cb

  var scStatusDetail = {};

  function do_ajax_form_tbl_georref_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    if (sc_insert_open)
    {
        do_ajax_form_tbl_georref_cancel_insert(sc_num_ult_line);
    }
    nm_uncheck_delete();
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    for (iNavForm = 1; iNavForm < <?php echo $this->sc_max_reg; ?> + 1; iNavForm++)
    {
      scAjaxHideErrorDisplay("id_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_0_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_1_" + iNavForm);
      scAjaxHideErrorDisplay("comuna_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_2_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_3_" + iNavForm);
      scAjaxHideErrorDisplay("agenda_" + iNavForm);
      scAjaxHideErrorDisplay("rce_" + iNavForm);
      scAjaxHideErrorDisplay("indicaciones_" + iNavForm);
      scAjaxHideErrorDisplay("dental_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_4_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_5_" + iNavForm);
      scAjaxHideErrorDisplay("rce_1_" + iNavForm);
      scAjaxHideErrorDisplay("indicaciones_1_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_6_" + iNavForm);
      scAjaxHideErrorDisplay("rce_2_" + iNavForm);
      scAjaxHideErrorDisplay("indicaciones_2_" + iNavForm);
      scAjaxHideErrorDisplay("triage_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_7_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_8_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_9_" + iNavForm);
      scAjaxHideErrorDisplay("dispensacion_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_10_" + iNavForm);
      scAjaxHideErrorDisplay("laboratorio_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_11_" + iNavForm);
      scAjaxHideErrorDisplay("sc_field_12_" + iNavForm);
      scAjaxHideErrorDisplay("erp_" + iNavForm);
      scAjaxHideErrorDisplay("pabellon_" + iNavForm);
      scAjaxHideErrorDisplay("maternidad_" + iNavForm);
      scAjaxHideErrorDisplay("archivo_" + iNavForm);
      scAjaxHideErrorDisplay("lme_" + iNavForm);
    }
    var var_id_ = document.F2.id_.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_tbl_georref_navigate_form(var_id_, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_tbl_georref_navigate_form_cb);
  } // do_ajax_form_tbl_georref_navigate_form

  function do_ajax_form_tbl_georref_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    var var_last_index = oResp["rsSize"];
    sc_mupload_ok = true;
    scAjaxSetFields();
    document.F2.id_.value = scAjaxGetKeyValue("id_" + var_last_index);
    var_last_index = parseInt(var_last_index) + 1;
    for (iNavigateForm = 1; iNavigateForm < var_last_index; iNavigateForm++)
    {
      if (document.getElementById("idVertRow" + iNavigateForm))
      {
        document.getElementById("idVertRow" + iNavigateForm).style.display = "";
      }
    }
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    for (iNavigatedel = <?php echo $this->sc_max_reg; ?>; iNavigatedel >= iNavigateForm; iNavigatedel--)
    {
        oTBodyOld.deleteRow(iNavigatedel);
        bRefreshTable = true;
    }
    document.F1.sc_contr_vert.value = var_last_index;
    scAjaxSetSummary();
    scAjaxSetNavpage();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("t");
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    for (var iImg = 0; iImg < var_last_index; iImg++)
    {
    }
    scAjaxSetBtnVars();
    scErrorLineReset();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert();
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_tbl_georref_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_tbl_georref_navigate_form_cb
  function sc_hide_form_tbl_georref_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_tbl_georref_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc

<?php
$sLineInfo = $this->Embutida_form ? '' : ' (linha " + iNumLinha + ")';
?>
  function ajax_create_tables(iNumLinha)
  {
    ajax_field_list[iTotCampos] = "id_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_0_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_1_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "comuna_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_2_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_3_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "agenda_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "rce_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "indicaciones_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dental_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_4_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_5_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "rce_1_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "indicaciones_1_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_6_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "rce_2_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "indicaciones_2_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "triage_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_7_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_8_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_9_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "dispensacion_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_10_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "laboratorio_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_11_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "sc_field_12_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "erp_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "pabellon_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "maternidad_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "archivo_" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "lme_" + iNumLinha;
    iTotCampos++;
    ajax_error_list["id_" + iNumLinha] = {"label": "Id<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_0_" + iNumLinha] = {"label": "Codigo Deis Nuevo<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_1_" + iNumLinha] = {"label": "Codigo Deis Antiguo<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["comuna_" + iNumLinha] = {"label": "COMUNA<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_2_" + iNumLinha] = {"label": "Nivel De Atencion<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_3_" + iNumLinha] = {"label": "Nombre Oficial<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["agenda_" + iNumLinha] = {"label": "Agenda<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["rce_" + iNumLinha] = {"label": "RCE<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["indicaciones_" + iNumLinha] = {"label": "Indicaciones<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dental_" + iNumLinha] = {"label": "Dental<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_4_" + iNumLinha] = {"label": "Registro / Admision<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_5_" + iNumLinha] = {"label": "Administracion De Camas<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["rce_1_" + iNumLinha] = {"label": "RCE 1<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["indicaciones_1_" + iNumLinha] = {"label": "Indicaciones 1<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_6_" + iNumLinha] = {"label": "Registro / Admision 1<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["rce_2_" + iNumLinha] = {"label": "RCE 2<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["indicaciones_2_" + iNumLinha] = {"label": "Indicaciones 2<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["triage_" + iNumLinha] = {"label": "Triage<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_7_" + iNumLinha] = {"label": "Mapa De Piso<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_8_" + iNumLinha] = {"label": "Solicitud De Camas<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_9_" + iNumLinha] = {"label": "Alta Pacientes<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["dispensacion_" + iNumLinha] = {"label": "Dispensacion<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_10_" + iNumLinha] = {"label": "Control Stock<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["laboratorio_" + iNumLinha] = {"label": "Laboratorio<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_11_" + iNumLinha] = {"label": "RIS/PACS<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["sc_field_12_" + iNumLinha] = {"label": "Validacion FONASA<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["erp_" + iNumLinha] = {"label": "ERP<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["pabellon_" + iNumLinha] = {"label": "Pabellon<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["maternidad_" + iNumLinha] = {"label": "Maternidad<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["archivo_" + iNumLinha] = {"label": "Archivo<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["lme_" + iNumLinha] = {"label": "LME<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_field_mult["id_"][iNumLinha] = "id_" + iNumLinha;
    ajax_field_mult["sc_field_0_"][iNumLinha] = "sc_field_0_" + iNumLinha;
    ajax_field_mult["sc_field_1_"][iNumLinha] = "sc_field_1_" + iNumLinha;
    ajax_field_mult["comuna_"][iNumLinha] = "comuna_" + iNumLinha;
    ajax_field_mult["sc_field_2_"][iNumLinha] = "sc_field_2_" + iNumLinha;
    ajax_field_mult["sc_field_3_"][iNumLinha] = "sc_field_3_" + iNumLinha;
    ajax_field_mult["agenda_"][iNumLinha] = "agenda_" + iNumLinha;
    ajax_field_mult["rce_"][iNumLinha] = "rce_" + iNumLinha;
    ajax_field_mult["indicaciones_"][iNumLinha] = "indicaciones_" + iNumLinha;
    ajax_field_mult["dental_"][iNumLinha] = "dental_" + iNumLinha;
    ajax_field_mult["sc_field_4_"][iNumLinha] = "sc_field_4_" + iNumLinha;
    ajax_field_mult["sc_field_5_"][iNumLinha] = "sc_field_5_" + iNumLinha;
    ajax_field_mult["rce_1_"][iNumLinha] = "rce_1_" + iNumLinha;
    ajax_field_mult["indicaciones_1_"][iNumLinha] = "indicaciones_1_" + iNumLinha;
    ajax_field_mult["sc_field_6_"][iNumLinha] = "sc_field_6_" + iNumLinha;
    ajax_field_mult["rce_2_"][iNumLinha] = "rce_2_" + iNumLinha;
    ajax_field_mult["indicaciones_2_"][iNumLinha] = "indicaciones_2_" + iNumLinha;
    ajax_field_mult["triage_"][iNumLinha] = "triage_" + iNumLinha;
    ajax_field_mult["sc_field_7_"][iNumLinha] = "sc_field_7_" + iNumLinha;
    ajax_field_mult["sc_field_8_"][iNumLinha] = "sc_field_8_" + iNumLinha;
    ajax_field_mult["sc_field_9_"][iNumLinha] = "sc_field_9_" + iNumLinha;
    ajax_field_mult["dispensacion_"][iNumLinha] = "dispensacion_" + iNumLinha;
    ajax_field_mult["sc_field_10_"][iNumLinha] = "sc_field_10_" + iNumLinha;
    ajax_field_mult["laboratorio_"][iNumLinha] = "laboratorio_" + iNumLinha;
    ajax_field_mult["sc_field_11_"][iNumLinha] = "sc_field_11_" + iNumLinha;
    ajax_field_mult["sc_field_12_"][iNumLinha] = "sc_field_12_" + iNumLinha;
    ajax_field_mult["erp_"][iNumLinha] = "erp_" + iNumLinha;
    ajax_field_mult["pabellon_"][iNumLinha] = "pabellon_" + iNumLinha;
    ajax_field_mult["maternidad_"][iNumLinha] = "maternidad_" + iNumLinha;
    ajax_field_mult["archivo_"][iNumLinha] = "archivo_" + iNumLinha;
    ajax_field_mult["lme_"][iNumLinha] = "lme_" + iNumLinha;
    ajax_field_id["id_" + iNumLinha] = new Array("hidden_field_label_id_", "hidden_field_data_id_" + iNumLinha);
    ajax_field_id["sc_field_0_" + iNumLinha] = new Array("hidden_field_label_sc_field_0_", "hidden_field_data_sc_field_0_" + iNumLinha);
    ajax_field_id["sc_field_1_" + iNumLinha] = new Array("hidden_field_label_sc_field_1_", "hidden_field_data_sc_field_1_" + iNumLinha);
    ajax_field_id["comuna_" + iNumLinha] = new Array("hidden_field_label_comuna_", "hidden_field_data_comuna_" + iNumLinha);
    ajax_field_id["sc_field_2_" + iNumLinha] = new Array("hidden_field_label_sc_field_2_", "hidden_field_data_sc_field_2_" + iNumLinha);
    ajax_field_id["sc_field_3_" + iNumLinha] = new Array("hidden_field_label_sc_field_3_", "hidden_field_data_sc_field_3_" + iNumLinha);
    ajax_field_id["agenda_" + iNumLinha] = new Array("hidden_field_label_agenda_", "hidden_field_data_agenda_" + iNumLinha);
    ajax_field_id["rce_" + iNumLinha] = new Array("hidden_field_label_rce_", "hidden_field_data_rce_" + iNumLinha);
    ajax_field_id["indicaciones_" + iNumLinha] = new Array("hidden_field_label_indicaciones_", "hidden_field_data_indicaciones_" + iNumLinha);
    ajax_field_id["dental_" + iNumLinha] = new Array("hidden_field_label_dental_", "hidden_field_data_dental_" + iNumLinha);
    ajax_field_id["sc_field_4_" + iNumLinha] = new Array("hidden_field_label_sc_field_4_", "hidden_field_data_sc_field_4_" + iNumLinha);
    ajax_field_id["sc_field_5_" + iNumLinha] = new Array("hidden_field_label_sc_field_5_", "hidden_field_data_sc_field_5_" + iNumLinha);
    ajax_field_id["rce_1_" + iNumLinha] = new Array("hidden_field_label_rce_1_", "hidden_field_data_rce_1_" + iNumLinha);
    ajax_field_id["indicaciones_1_" + iNumLinha] = new Array("hidden_field_label_indicaciones_1_", "hidden_field_data_indicaciones_1_" + iNumLinha);
    ajax_field_id["sc_field_6_" + iNumLinha] = new Array("hidden_field_label_sc_field_6_", "hidden_field_data_sc_field_6_" + iNumLinha);
    ajax_field_id["rce_2_" + iNumLinha] = new Array("hidden_field_label_rce_2_", "hidden_field_data_rce_2_" + iNumLinha);
    ajax_field_id["indicaciones_2_" + iNumLinha] = new Array("hidden_field_label_indicaciones_2_", "hidden_field_data_indicaciones_2_" + iNumLinha);
    ajax_field_id["triage_" + iNumLinha] = new Array("hidden_field_label_triage_", "hidden_field_data_triage_" + iNumLinha);
    ajax_field_id["sc_field_7_" + iNumLinha] = new Array("hidden_field_label_sc_field_7_", "hidden_field_data_sc_field_7_" + iNumLinha);
    ajax_field_id["sc_field_8_" + iNumLinha] = new Array("hidden_field_label_sc_field_8_", "hidden_field_data_sc_field_8_" + iNumLinha);
    ajax_field_id["sc_field_9_" + iNumLinha] = new Array("hidden_field_label_sc_field_9_", "hidden_field_data_sc_field_9_" + iNumLinha);
    ajax_field_id["dispensacion_" + iNumLinha] = new Array("hidden_field_label_dispensacion_", "hidden_field_data_dispensacion_" + iNumLinha);
    ajax_field_id["sc_field_10_" + iNumLinha] = new Array("hidden_field_label_sc_field_10_", "hidden_field_data_sc_field_10_" + iNumLinha);
    ajax_field_id["laboratorio_" + iNumLinha] = new Array("hidden_field_label_laboratorio_", "hidden_field_data_laboratorio_" + iNumLinha);
    ajax_field_id["sc_field_11_" + iNumLinha] = new Array("hidden_field_label_sc_field_11_", "hidden_field_data_sc_field_11_" + iNumLinha);
    ajax_field_id["sc_field_12_" + iNumLinha] = new Array("hidden_field_label_sc_field_12_", "hidden_field_data_sc_field_12_" + iNumLinha);
    ajax_field_id["erp_" + iNumLinha] = new Array("hidden_field_label_erp_", "hidden_field_data_erp_" + iNumLinha);
    ajax_field_id["pabellon_" + iNumLinha] = new Array("hidden_field_label_pabellon_", "hidden_field_data_pabellon_" + iNumLinha);
    ajax_field_id["maternidad_" + iNumLinha] = new Array("hidden_field_label_maternidad_", "hidden_field_data_maternidad_" + iNumLinha);
    ajax_field_id["archivo_" + iNumLinha] = new Array("hidden_field_label_archivo_", "hidden_field_data_archivo_" + iNumLinha);
    ajax_field_id["lme_" + iNumLinha] = new Array("hidden_field_label_lme_", "hidden_field_data_lme_" + iNumLinha);
    ajax_error_count["id_" + iNumLinha] = "off";
    ajax_error_count["sc_field_0_" + iNumLinha] = "off";
    ajax_error_count["sc_field_1_" + iNumLinha] = "off";
    ajax_error_count["comuna_" + iNumLinha] = "off";
    ajax_error_count["sc_field_2_" + iNumLinha] = "off";
    ajax_error_count["sc_field_3_" + iNumLinha] = "off";
    ajax_error_count["agenda_" + iNumLinha] = "off";
    ajax_error_count["rce_" + iNumLinha] = "off";
    ajax_error_count["indicaciones_" + iNumLinha] = "off";
    ajax_error_count["dental_" + iNumLinha] = "off";
    ajax_error_count["sc_field_4_" + iNumLinha] = "off";
    ajax_error_count["sc_field_5_" + iNumLinha] = "off";
    ajax_error_count["rce_1_" + iNumLinha] = "off";
    ajax_error_count["indicaciones_1_" + iNumLinha] = "off";
    ajax_error_count["sc_field_6_" + iNumLinha] = "off";
    ajax_error_count["rce_2_" + iNumLinha] = "off";
    ajax_error_count["indicaciones_2_" + iNumLinha] = "off";
    ajax_error_count["triage_" + iNumLinha] = "off";
    ajax_error_count["sc_field_7_" + iNumLinha] = "off";
    ajax_error_count["sc_field_8_" + iNumLinha] = "off";
    ajax_error_count["sc_field_9_" + iNumLinha] = "off";
    ajax_error_count["dispensacion_" + iNumLinha] = "off";
    ajax_error_count["sc_field_10_" + iNumLinha] = "off";
    ajax_error_count["laboratorio_" + iNumLinha] = "off";
    ajax_error_count["sc_field_11_" + iNumLinha] = "off";
    ajax_error_count["sc_field_12_" + iNumLinha] = "off";
    ajax_error_count["erp_" + iNumLinha] = "off";
    ajax_error_count["pabellon_" + iNumLinha] = "off";
    ajax_error_count["maternidad_" + iNumLinha] = "off";
    ajax_error_count["archivo_" + iNumLinha] = "off";
    ajax_error_count["lme_" + iNumLinha] = "off";
<?php
if (!$this->Grid_editavel)
{
?>
    ajax_read_only["id_" + iNumLinha] = "on";
    ajax_read_only["sc_field_0_" + iNumLinha] = "off";
    ajax_read_only["sc_field_1_" + iNumLinha] = "off";
    ajax_read_only["comuna_" + iNumLinha] = "off";
    ajax_read_only["sc_field_2_" + iNumLinha] = "off";
    ajax_read_only["sc_field_3_" + iNumLinha] = "off";
    ajax_read_only["agenda_" + iNumLinha] = "off";
    ajax_read_only["rce_" + iNumLinha] = "off";
    ajax_read_only["indicaciones_" + iNumLinha] = "off";
    ajax_read_only["dental_" + iNumLinha] = "off";
    ajax_read_only["sc_field_4_" + iNumLinha] = "off";
    ajax_read_only["sc_field_5_" + iNumLinha] = "off";
    ajax_read_only["rce_1_" + iNumLinha] = "off";
    ajax_read_only["indicaciones_1_" + iNumLinha] = "off";
    ajax_read_only["sc_field_6_" + iNumLinha] = "off";
    ajax_read_only["rce_2_" + iNumLinha] = "off";
    ajax_read_only["indicaciones_2_" + iNumLinha] = "off";
    ajax_read_only["triage_" + iNumLinha] = "off";
    ajax_read_only["sc_field_7_" + iNumLinha] = "off";
    ajax_read_only["sc_field_8_" + iNumLinha] = "off";
    ajax_read_only["sc_field_9_" + iNumLinha] = "off";
    ajax_read_only["dispensacion_" + iNumLinha] = "off";
    ajax_read_only["sc_field_10_" + iNumLinha] = "off";
    ajax_read_only["laboratorio_" + iNumLinha] = "off";
    ajax_read_only["sc_field_11_" + iNumLinha] = "off";
    ajax_read_only["sc_field_12_" + iNumLinha] = "off";
    ajax_read_only["erp_" + iNumLinha] = "off";
    ajax_read_only["pabellon_" + iNumLinha] = "off";
    ajax_read_only["maternidad_" + iNumLinha] = "off";
    ajax_read_only["archivo_" + iNumLinha] = "off";
    ajax_read_only["lme_" + iNumLinha] = "off";
<?php
}
else
{
?>
    ajax_read_only["id_" + iNumLinha] = "on";
    ajax_read_only["sc_field_0_" + iNumLinha] = "on";
    ajax_read_only["sc_field_1_" + iNumLinha] = "on";
    ajax_read_only["comuna_" + iNumLinha] = "on";
    ajax_read_only["sc_field_2_" + iNumLinha] = "on";
    ajax_read_only["sc_field_3_" + iNumLinha] = "on";
    ajax_read_only["agenda_" + iNumLinha] = "on";
    ajax_read_only["rce_" + iNumLinha] = "on";
    ajax_read_only["indicaciones_" + iNumLinha] = "on";
    ajax_read_only["dental_" + iNumLinha] = "on";
    ajax_read_only["sc_field_4_" + iNumLinha] = "on";
    ajax_read_only["sc_field_5_" + iNumLinha] = "on";
    ajax_read_only["rce_1_" + iNumLinha] = "on";
    ajax_read_only["indicaciones_1_" + iNumLinha] = "on";
    ajax_read_only["sc_field_6_" + iNumLinha] = "on";
    ajax_read_only["rce_2_" + iNumLinha] = "on";
    ajax_read_only["indicaciones_2_" + iNumLinha] = "on";
    ajax_read_only["triage_" + iNumLinha] = "on";
    ajax_read_only["sc_field_7_" + iNumLinha] = "on";
    ajax_read_only["sc_field_8_" + iNumLinha] = "on";
    ajax_read_only["sc_field_9_" + iNumLinha] = "on";
    ajax_read_only["dispensacion_" + iNumLinha] = "on";
    ajax_read_only["sc_field_10_" + iNumLinha] = "on";
    ajax_read_only["laboratorio_" + iNumLinha] = "on";
    ajax_read_only["sc_field_11_" + iNumLinha] = "on";
    ajax_read_only["sc_field_12_" + iNumLinha] = "on";
    ajax_read_only["erp_" + iNumLinha] = "on";
    ajax_read_only["pabellon_" + iNumLinha] = "on";
    ajax_read_only["maternidad_" + iNumLinha] = "on";
    ajax_read_only["archivo_" + iNumLinha] = "on";
    ajax_read_only["lme_" + iNumLinha] = "on";
<?php
}
?>
  }
  function ajax_destroy_tables(iNumLinha)
  {
    ajax_error_list["id_" + iNumLinha] = null;
    ajax_error_list["sc_field_0_" + iNumLinha] = null;
    ajax_error_list["sc_field_1_" + iNumLinha] = null;
    ajax_error_list["comuna_" + iNumLinha] = null;
    ajax_error_list["sc_field_2_" + iNumLinha] = null;
    ajax_error_list["sc_field_3_" + iNumLinha] = null;
    ajax_error_list["agenda_" + iNumLinha] = null;
    ajax_error_list["rce_" + iNumLinha] = null;
    ajax_error_list["indicaciones_" + iNumLinha] = null;
    ajax_error_list["dental_" + iNumLinha] = null;
    ajax_error_list["sc_field_4_" + iNumLinha] = null;
    ajax_error_list["sc_field_5_" + iNumLinha] = null;
    ajax_error_list["rce_1_" + iNumLinha] = null;
    ajax_error_list["indicaciones_1_" + iNumLinha] = null;
    ajax_error_list["sc_field_6_" + iNumLinha] = null;
    ajax_error_list["rce_2_" + iNumLinha] = null;
    ajax_error_list["indicaciones_2_" + iNumLinha] = null;
    ajax_error_list["triage_" + iNumLinha] = null;
    ajax_error_list["sc_field_7_" + iNumLinha] = null;
    ajax_error_list["sc_field_8_" + iNumLinha] = null;
    ajax_error_list["sc_field_9_" + iNumLinha] = null;
    ajax_error_list["dispensacion_" + iNumLinha] = null;
    ajax_error_list["sc_field_10_" + iNumLinha] = null;
    ajax_error_list["laboratorio_" + iNumLinha] = null;
    ajax_error_list["sc_field_11_" + iNumLinha] = null;
    ajax_error_list["sc_field_12_" + iNumLinha] = null;
    ajax_error_list["erp_" + iNumLinha] = null;
    ajax_error_list["pabellon_" + iNumLinha] = null;
    ajax_error_list["maternidad_" + iNumLinha] = null;
    ajax_error_list["archivo_" + iNumLinha] = null;
    ajax_error_list["lme_" + iNumLinha] = null;
  }

  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  iTotCampos = 0;
  iTotDt_Hr  = 0;

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {};
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "id_": new Array(),
    "sc_field_0_": new Array(),
    "sc_field_1_": new Array(),
    "comuna_": new Array(),
    "sc_field_2_": new Array(),
    "sc_field_3_": new Array(),
    "agenda_": new Array(),
    "rce_": new Array(),
    "indicaciones_": new Array(),
    "dental_": new Array(),
    "sc_field_4_": new Array(),
    "sc_field_5_": new Array(),
    "rce_1_": new Array(),
    "indicaciones_1_": new Array(),
    "sc_field_6_": new Array(),
    "rce_2_": new Array(),
    "indicaciones_2_": new Array(),
    "triage_": new Array(),
    "sc_field_7_": new Array(),
    "sc_field_8_": new Array(),
    "sc_field_9_": new Array(),
    "dispensacion_": new Array(),
    "sc_field_10_": new Array(),
    "laboratorio_": new Array(),
    "sc_field_11_": new Array(),
    "sc_field_12_": new Array(),
    "erp_": new Array(),
    "pabellon_": new Array(),
    "maternidad_": new Array(),
    "archivo_": new Array(),
    "lme_": new Array()
  };

  var ajax_field_id = {};

  var ajax_read_only = {};

  var ajax_error_count = {};

  var Lim_linhas = <?php echo $sc_seq_vert ?>;
  for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
  {
     ajax_create_tables(iNumLinha);
  }

  function scRemoveErrors()
  {
    for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
    {
      ajax_error_list["id_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_0_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_0_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_0_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_0_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_0_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_1_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_1_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_1_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_1_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_1_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["comuna_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["comuna_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["comuna_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["comuna_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["comuna_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_2_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_2_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_2_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_2_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_2_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_3_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_3_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_3_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_3_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_3_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["agenda_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["agenda_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["agenda_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["agenda_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["agenda_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["rce_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["rce_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["rce_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["rce_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["rce_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["indicaciones_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["indicaciones_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["indicaciones_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["indicaciones_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["indicaciones_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dental_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dental_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dental_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dental_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dental_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_4_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_4_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_4_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_4_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_4_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_5_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_5_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_5_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_5_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_5_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["rce_1_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["rce_1_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["rce_1_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["rce_1_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["rce_1_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["indicaciones_1_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["indicaciones_1_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["indicaciones_1_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["indicaciones_1_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["indicaciones_1_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_6_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_6_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_6_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_6_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_6_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["rce_2_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["rce_2_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["rce_2_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["rce_2_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["rce_2_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["indicaciones_2_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["indicaciones_2_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["indicaciones_2_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["indicaciones_2_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["indicaciones_2_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["triage_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["triage_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["triage_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["triage_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["triage_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_7_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_7_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_7_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_7_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_7_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_8_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_8_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_8_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_8_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_8_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_9_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_9_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_9_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_9_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_9_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["dispensacion_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["dispensacion_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["dispensacion_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["dispensacion_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["dispensacion_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_10_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_10_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_10_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_10_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_10_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["laboratorio_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["laboratorio_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["laboratorio_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["laboratorio_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["laboratorio_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_11_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_11_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_11_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_11_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_11_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["sc_field_12_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["sc_field_12_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["sc_field_12_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["sc_field_12_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["sc_field_12_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["erp_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["erp_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["erp_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["erp_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["erp_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["pabellon_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["pabellon_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["pabellon_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["pabellon_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["pabellon_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["maternidad_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["maternidad_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["maternidad_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["maternidad_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["maternidad_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["archivo_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["archivo_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["archivo_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["archivo_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["archivo_" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["lme_" + iNumLinha]["valid"] = new Array();
      ajax_error_list["lme_" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["lme_" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["lme_" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["lme_" + iNumLinha]["onfocus"] = new Array();
    }
  }

  function mdOpenLine(iSeq)
  {
    if (document.getElementById("sc_open_line_" + iSeq))
    {
      document.getElementById("sc_open_line_" + iSeq).style.display = "none";
    }
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
    if (document.getElementById("sc_exc_line_" + iSeq))
    {
      document.getElementById("sc_exc_line_" + iSeq).style.display = "none";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + iSeq))
    {
      document.getElementById("sc_upd_line_" + iSeq).style.display = "";
    }
    if (document.getElementById("sc_cancelu_line_" + iSeq))
    {
      document.getElementById("sc_cancelu_line_" + iSeq).style.display = "";
    }
    mdOpenObjects(iSeq);
  }

  function mdOpenObjects(iSeq)
  {
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_'])) ? $this->nmgp_cmp_readonly['id_'] : 'on';
?>
    scAjaxFieldRead("id_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_0_'])) ? $this->nmgp_cmp_readonly['sc_field_0_'] : 'off';
?>
    scAjaxFieldRead("sc_field_0_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_1_'])) ? $this->nmgp_cmp_readonly['sc_field_1_'] : 'off';
?>
    scAjaxFieldRead("sc_field_1_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['comuna_'])) ? $this->nmgp_cmp_readonly['comuna_'] : 'off';
?>
    scAjaxFieldRead("comuna_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_2_'])) ? $this->nmgp_cmp_readonly['sc_field_2_'] : 'off';
?>
    scAjaxFieldRead("sc_field_2_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_3_'])) ? $this->nmgp_cmp_readonly['sc_field_3_'] : 'off';
?>
    scAjaxFieldRead("sc_field_3_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['agenda_'])) ? $this->nmgp_cmp_readonly['agenda_'] : 'off';
?>
    scAjaxFieldRead("agenda_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['rce_'])) ? $this->nmgp_cmp_readonly['rce_'] : 'off';
?>
    scAjaxFieldRead("rce_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['indicaciones_'])) ? $this->nmgp_cmp_readonly['indicaciones_'] : 'off';
?>
    scAjaxFieldRead("indicaciones_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dental_'])) ? $this->nmgp_cmp_readonly['dental_'] : 'off';
?>
    scAjaxFieldRead("dental_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_4_'])) ? $this->nmgp_cmp_readonly['sc_field_4_'] : 'off';
?>
    scAjaxFieldRead("sc_field_4_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_5_'])) ? $this->nmgp_cmp_readonly['sc_field_5_'] : 'off';
?>
    scAjaxFieldRead("sc_field_5_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['rce_1_'])) ? $this->nmgp_cmp_readonly['rce_1_'] : 'off';
?>
    scAjaxFieldRead("rce_1_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['indicaciones_1_'])) ? $this->nmgp_cmp_readonly['indicaciones_1_'] : 'off';
?>
    scAjaxFieldRead("indicaciones_1_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_6_'])) ? $this->nmgp_cmp_readonly['sc_field_6_'] : 'off';
?>
    scAjaxFieldRead("sc_field_6_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['rce_2_'])) ? $this->nmgp_cmp_readonly['rce_2_'] : 'off';
?>
    scAjaxFieldRead("rce_2_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['indicaciones_2_'])) ? $this->nmgp_cmp_readonly['indicaciones_2_'] : 'off';
?>
    scAjaxFieldRead("indicaciones_2_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['triage_'])) ? $this->nmgp_cmp_readonly['triage_'] : 'off';
?>
    scAjaxFieldRead("triage_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_7_'])) ? $this->nmgp_cmp_readonly['sc_field_7_'] : 'off';
?>
    scAjaxFieldRead("sc_field_7_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_8_'])) ? $this->nmgp_cmp_readonly['sc_field_8_'] : 'off';
?>
    scAjaxFieldRead("sc_field_8_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_9_'])) ? $this->nmgp_cmp_readonly['sc_field_9_'] : 'off';
?>
    scAjaxFieldRead("sc_field_9_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['dispensacion_'])) ? $this->nmgp_cmp_readonly['dispensacion_'] : 'off';
?>
    scAjaxFieldRead("dispensacion_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_10_'])) ? $this->nmgp_cmp_readonly['sc_field_10_'] : 'off';
?>
    scAjaxFieldRead("sc_field_10_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['laboratorio_'])) ? $this->nmgp_cmp_readonly['laboratorio_'] : 'off';
?>
    scAjaxFieldRead("laboratorio_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_11_'])) ? $this->nmgp_cmp_readonly['sc_field_11_'] : 'off';
?>
    scAjaxFieldRead("sc_field_11_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['sc_field_12_'])) ? $this->nmgp_cmp_readonly['sc_field_12_'] : 'off';
?>
    scAjaxFieldRead("sc_field_12_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['erp_'])) ? $this->nmgp_cmp_readonly['erp_'] : 'off';
?>
    scAjaxFieldRead("erp_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['pabellon_'])) ? $this->nmgp_cmp_readonly['pabellon_'] : 'off';
?>
    scAjaxFieldRead("pabellon_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['maternidad_'])) ? $this->nmgp_cmp_readonly['maternidad_'] : 'off';
?>
    scAjaxFieldRead("maternidad_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['archivo_'])) ? $this->nmgp_cmp_readonly['archivo_'] : 'off';
?>
    scAjaxFieldRead("archivo_" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['lme_'])) ? $this->nmgp_cmp_readonly['lme_'] : 'off';
?>
    scAjaxFieldRead("lme_" + iSeq, "<?php echo $NM_contr_readonly ?>");
  }

  function mdCloseObjects(iSeq)
  {
    scAjaxFieldRead("id_" + iSeq, "on");
    scAjaxFieldRead("sc_field_0_" + iSeq, "on");
    scAjaxFieldRead("sc_field_1_" + iSeq, "on");
    scAjaxFieldRead("comuna_" + iSeq, "on");
    scAjaxFieldRead("sc_field_2_" + iSeq, "on");
    scAjaxFieldRead("sc_field_3_" + iSeq, "on");
    scAjaxFieldRead("agenda_" + iSeq, "on");
    scAjaxFieldRead("rce_" + iSeq, "on");
    scAjaxFieldRead("indicaciones_" + iSeq, "on");
    scAjaxFieldRead("dental_" + iSeq, "on");
    scAjaxFieldRead("sc_field_4_" + iSeq, "on");
    scAjaxFieldRead("sc_field_5_" + iSeq, "on");
    scAjaxFieldRead("rce_1_" + iSeq, "on");
    scAjaxFieldRead("indicaciones_1_" + iSeq, "on");
    scAjaxFieldRead("sc_field_6_" + iSeq, "on");
    scAjaxFieldRead("rce_2_" + iSeq, "on");
    scAjaxFieldRead("indicaciones_2_" + iSeq, "on");
    scAjaxFieldRead("triage_" + iSeq, "on");
    scAjaxFieldRead("sc_field_7_" + iSeq, "on");
    scAjaxFieldRead("sc_field_8_" + iSeq, "on");
    scAjaxFieldRead("sc_field_9_" + iSeq, "on");
    scAjaxFieldRead("dispensacion_" + iSeq, "on");
    scAjaxFieldRead("sc_field_10_" + iSeq, "on");
    scAjaxFieldRead("laboratorio_" + iSeq, "on");
    scAjaxFieldRead("sc_field_11_" + iSeq, "on");
    scAjaxFieldRead("sc_field_12_" + iSeq, "on");
    scAjaxFieldRead("erp_" + iSeq, "on");
    scAjaxFieldRead("pabellon_" + iSeq, "on");
    scAjaxFieldRead("maternidad_" + iSeq, "on");
    scAjaxFieldRead("archivo_" + iSeq, "on");
    scAjaxFieldRead("lme_" + iSeq, "on");
  }

  function mdCloseLine()
  {
    if (!oResp["closeLine"] || "" == oResp["closeLine"])
    {
      return;
    }
<?php
    if ($this->nmgp_botoes['update'] == 'on')
    {
?>
    if (document.getElementById("sc_open_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_open_line_" + oResp["closeLine"]).style.display = "";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_upd_line_" + oResp["closeLine"]).style.display = "none";
    }
  }

  var sc_open_lines = 0;
  var orig_Nav_permite_ret = "";
  var orig_Nav_permite_ava = "";
  function scDisableNavigation()
  {
    if (0 == sc_open_lines)
    {
      orig_Nav_permite_ret = Nav_permite_ret;
      orig_Nav_permite_ava = Nav_permite_ava;
      Nav_permite_ret = "N";
      Nav_permite_ava = "N";
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
    sc_open_lines++;
  }

  function scEnableNavigation()
  {
    sc_open_lines--;
    if (0 == sc_open_lines)
    {
      Nav_permite_ret = orig_Nav_permite_ret;
      Nav_permite_ava = orig_Nav_permite_ava;
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scErrorLineOn(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "on";
    }
    if (bErrorRow || ("on" == ajax_error_count["id_" + iRow] || "on" == ajax_error_count["sc_field_0_" + iRow] || "on" == ajax_error_count["sc_field_1_" + iRow] || "on" == ajax_error_count["comuna_" + iRow] || "on" == ajax_error_count["sc_field_2_" + iRow] || "on" == ajax_error_count["sc_field_3_" + iRow] || "on" == ajax_error_count["agenda_" + iRow] || "on" == ajax_error_count["rce_" + iRow] || "on" == ajax_error_count["indicaciones_" + iRow] || "on" == ajax_error_count["dental_" + iRow] || "on" == ajax_error_count["sc_field_4_" + iRow] || "on" == ajax_error_count["sc_field_5_" + iRow] || "on" == ajax_error_count["rce_1_" + iRow] || "on" == ajax_error_count["indicaciones_1_" + iRow] || "on" == ajax_error_count["sc_field_6_" + iRow] || "on" == ajax_error_count["rce_2_" + iRow] || "on" == ajax_error_count["indicaciones_2_" + iRow] || "on" == ajax_error_count["triage_" + iRow] || "on" == ajax_error_count["sc_field_7_" + iRow] || "on" == ajax_error_count["sc_field_8_" + iRow] || "on" == ajax_error_count["sc_field_9_" + iRow] || "on" == ajax_error_count["dispensacion_" + iRow] || "on" == ajax_error_count["sc_field_10_" + iRow] || "on" == ajax_error_count["laboratorio_" + iRow] || "on" == ajax_error_count["sc_field_11_" + iRow] || "on" == ajax_error_count["sc_field_12_" + iRow] || "on" == ajax_error_count["erp_" + iRow] || "on" == ajax_error_count["pabellon_" + iRow] || "on" == ajax_error_count["maternidad_" + iRow] || "on" == ajax_error_count["archivo_" + iRow] || "on" == ajax_error_count["lme_" + iRow]))
    {
      if (document.getElementById("hidden_field_data_sc_seq" + iRow))
        document.getElementById("hidden_field_data_sc_seq" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_actions" + iRow))
        document.getElementById("hidden_field_data_sc_actions" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_id_" + iRow))
        document.getElementById("hidden_field_data_id_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_0_" + iRow))
        document.getElementById("hidden_field_data_sc_field_0_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_1_" + iRow))
        document.getElementById("hidden_field_data_sc_field_1_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_comuna_" + iRow))
        document.getElementById("hidden_field_data_comuna_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_2_" + iRow))
        document.getElementById("hidden_field_data_sc_field_2_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_3_" + iRow))
        document.getElementById("hidden_field_data_sc_field_3_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_agenda_" + iRow))
        document.getElementById("hidden_field_data_agenda_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_rce_" + iRow))
        document.getElementById("hidden_field_data_rce_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_indicaciones_" + iRow))
        document.getElementById("hidden_field_data_indicaciones_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dental_" + iRow))
        document.getElementById("hidden_field_data_dental_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_4_" + iRow))
        document.getElementById("hidden_field_data_sc_field_4_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_5_" + iRow))
        document.getElementById("hidden_field_data_sc_field_5_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_rce_1_" + iRow))
        document.getElementById("hidden_field_data_rce_1_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_indicaciones_1_" + iRow))
        document.getElementById("hidden_field_data_indicaciones_1_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_6_" + iRow))
        document.getElementById("hidden_field_data_sc_field_6_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_rce_2_" + iRow))
        document.getElementById("hidden_field_data_rce_2_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_indicaciones_2_" + iRow))
        document.getElementById("hidden_field_data_indicaciones_2_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_triage_" + iRow))
        document.getElementById("hidden_field_data_triage_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_7_" + iRow))
        document.getElementById("hidden_field_data_sc_field_7_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_8_" + iRow))
        document.getElementById("hidden_field_data_sc_field_8_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_9_" + iRow))
        document.getElementById("hidden_field_data_sc_field_9_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_dispensacion_" + iRow))
        document.getElementById("hidden_field_data_dispensacion_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_10_" + iRow))
        document.getElementById("hidden_field_data_sc_field_10_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_laboratorio_" + iRow))
        document.getElementById("hidden_field_data_laboratorio_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_11_" + iRow))
        document.getElementById("hidden_field_data_sc_field_11_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_sc_field_12_" + iRow))
        document.getElementById("hidden_field_data_sc_field_12_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_erp_" + iRow))
        document.getElementById("hidden_field_data_erp_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_pabellon_" + iRow))
        document.getElementById("hidden_field_data_pabellon_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_maternidad_" + iRow))
        document.getElementById("hidden_field_data_maternidad_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_archivo_" + iRow))
        document.getElementById("hidden_field_data_archivo_" + iRow).className = "scFormErrorLine";
      if (document.getElementById("hidden_field_data_lme_" + iRow))
        document.getElementById("hidden_field_data_lme_" + iRow).className = "scFormErrorLine";
    }
  }

  function scErrorLineOff(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "off";
    }
    if (bErrorRow || ("off" == ajax_error_count["id_" + iRow] && "off" == ajax_error_count["sc_field_0_" + iRow] && "off" == ajax_error_count["sc_field_1_" + iRow] && "off" == ajax_error_count["comuna_" + iRow] && "off" == ajax_error_count["sc_field_2_" + iRow] && "off" == ajax_error_count["sc_field_3_" + iRow] && "off" == ajax_error_count["agenda_" + iRow] && "off" == ajax_error_count["rce_" + iRow] && "off" == ajax_error_count["indicaciones_" + iRow] && "off" == ajax_error_count["dental_" + iRow] && "off" == ajax_error_count["sc_field_4_" + iRow] && "off" == ajax_error_count["sc_field_5_" + iRow] && "off" == ajax_error_count["rce_1_" + iRow] && "off" == ajax_error_count["indicaciones_1_" + iRow] && "off" == ajax_error_count["sc_field_6_" + iRow] && "off" == ajax_error_count["rce_2_" + iRow] && "off" == ajax_error_count["indicaciones_2_" + iRow] && "off" == ajax_error_count["triage_" + iRow] && "off" == ajax_error_count["sc_field_7_" + iRow] && "off" == ajax_error_count["sc_field_8_" + iRow] && "off" == ajax_error_count["sc_field_9_" + iRow] && "off" == ajax_error_count["dispensacion_" + iRow] && "off" == ajax_error_count["sc_field_10_" + iRow] && "off" == ajax_error_count["laboratorio_" + iRow] && "off" == ajax_error_count["sc_field_11_" + iRow] && "off" == ajax_error_count["sc_field_12_" + iRow] && "off" == ajax_error_count["erp_" + iRow] && "off" == ajax_error_count["pabellon_" + iRow] && "off" == ajax_error_count["maternidad_" + iRow] && "off" == ajax_error_count["archivo_" + iRow] && "off" == ajax_error_count["lme_" + iRow]))
    {
      if (bErrorRow)
      {
        ajax_error_count["id_" + iRow] = "off";
        ajax_error_count["sc_field_0_" + iRow] = "off";
        ajax_error_count["sc_field_1_" + iRow] = "off";
        ajax_error_count["comuna_" + iRow] = "off";
        ajax_error_count["sc_field_2_" + iRow] = "off";
        ajax_error_count["sc_field_3_" + iRow] = "off";
        ajax_error_count["agenda_" + iRow] = "off";
        ajax_error_count["rce_" + iRow] = "off";
        ajax_error_count["indicaciones_" + iRow] = "off";
        ajax_error_count["dental_" + iRow] = "off";
        ajax_error_count["sc_field_4_" + iRow] = "off";
        ajax_error_count["sc_field_5_" + iRow] = "off";
        ajax_error_count["rce_1_" + iRow] = "off";
        ajax_error_count["indicaciones_1_" + iRow] = "off";
        ajax_error_count["sc_field_6_" + iRow] = "off";
        ajax_error_count["rce_2_" + iRow] = "off";
        ajax_error_count["indicaciones_2_" + iRow] = "off";
        ajax_error_count["triage_" + iRow] = "off";
        ajax_error_count["sc_field_7_" + iRow] = "off";
        ajax_error_count["sc_field_8_" + iRow] = "off";
        ajax_error_count["sc_field_9_" + iRow] = "off";
        ajax_error_count["dispensacion_" + iRow] = "off";
        ajax_error_count["sc_field_10_" + iRow] = "off";
        ajax_error_count["laboratorio_" + iRow] = "off";
        ajax_error_count["sc_field_11_" + iRow] = "off";
        ajax_error_count["sc_field_12_" + iRow] = "off";
        ajax_error_count["erp_" + iRow] = "off";
        ajax_error_count["pabellon_" + iRow] = "off";
        ajax_error_count["maternidad_" + iRow] = "off";
        ajax_error_count["archivo_" + iRow] = "off";
        ajax_error_count["lme_" + iRow] = "off";
      }
      var sCssLine = scErrorLineCss(iRow);
      if (document.getElementById("hidden_field_data_sc_seq" + iRow))
        document.getElementById("hidden_field_data_sc_seq" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_actions" + iRow))
        document.getElementById("hidden_field_data_sc_actions" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_id_" + iRow))
        document.getElementById("hidden_field_data_id_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_0_" + iRow))
        document.getElementById("hidden_field_data_sc_field_0_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_1_" + iRow))
        document.getElementById("hidden_field_data_sc_field_1_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_comuna_" + iRow))
        document.getElementById("hidden_field_data_comuna_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_2_" + iRow))
        document.getElementById("hidden_field_data_sc_field_2_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_3_" + iRow))
        document.getElementById("hidden_field_data_sc_field_3_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_agenda_" + iRow))
        document.getElementById("hidden_field_data_agenda_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_rce_" + iRow))
        document.getElementById("hidden_field_data_rce_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_indicaciones_" + iRow))
        document.getElementById("hidden_field_data_indicaciones_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dental_" + iRow))
        document.getElementById("hidden_field_data_dental_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_4_" + iRow))
        document.getElementById("hidden_field_data_sc_field_4_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_5_" + iRow))
        document.getElementById("hidden_field_data_sc_field_5_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_rce_1_" + iRow))
        document.getElementById("hidden_field_data_rce_1_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_indicaciones_1_" + iRow))
        document.getElementById("hidden_field_data_indicaciones_1_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_6_" + iRow))
        document.getElementById("hidden_field_data_sc_field_6_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_rce_2_" + iRow))
        document.getElementById("hidden_field_data_rce_2_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_indicaciones_2_" + iRow))
        document.getElementById("hidden_field_data_indicaciones_2_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_triage_" + iRow))
        document.getElementById("hidden_field_data_triage_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_7_" + iRow))
        document.getElementById("hidden_field_data_sc_field_7_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_8_" + iRow))
        document.getElementById("hidden_field_data_sc_field_8_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_9_" + iRow))
        document.getElementById("hidden_field_data_sc_field_9_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_dispensacion_" + iRow))
        document.getElementById("hidden_field_data_dispensacion_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_10_" + iRow))
        document.getElementById("hidden_field_data_sc_field_10_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_laboratorio_" + iRow))
        document.getElementById("hidden_field_data_laboratorio_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_11_" + iRow))
        document.getElementById("hidden_field_data_sc_field_11_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_field_12_" + iRow))
        document.getElementById("hidden_field_data_sc_field_12_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_erp_" + iRow))
        document.getElementById("hidden_field_data_erp_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_pabellon_" + iRow))
        document.getElementById("hidden_field_data_pabellon_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_maternidad_" + iRow))
        document.getElementById("hidden_field_data_maternidad_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_archivo_" + iRow))
        document.getElementById("hidden_field_data_archivo_" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_lme_" + iRow))
        document.getElementById("hidden_field_data_lme_" + iRow).className = sCssLine;
    }
  }

  function scErrorLineReset()
  {
    for (iLineReset = 0; iLineReset < iAjaxNewLine; iLineReset++)
    {
      scErrorLineOff(iLineReset, "__sc_all__");
    }
  }

  function scErrorLineCss(iRow)
  {
    return "scFormDataOddMult";
  }
  var bRefreshTable = false;
  function scRefreshTable()
  {
    if (bRefreshTable || document.F2.nmgp_opcao.value == "fast_search")
    {
      do_ajax_form_tbl_georref_table_refresh();
      bRefreshTable = false;
      return true;
    }
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("id_" == sIndex)
    {
      scAjaxSetFieldLabel(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_0_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_1_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("comuna_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_2_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_3_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("agenda_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("rce_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("indicaciones_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dental_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_4_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_5_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("rce_1_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("indicaciones_1_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_6_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("rce_2_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("indicaciones_2_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("triage_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_7_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_8_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_9_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("dispensacion_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_10_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("laboratorio_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_11_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sc_field_12_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("erp_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("pabellon_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("maternidad_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("archivo_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("lme_" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
