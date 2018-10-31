<?php
//
class form_tbl_georref_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'navPage'        => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id_;
   var $sc_field_0_;
   var $sc_field_1_;
   var $comuna_;
   var $sc_field_2_;
   var $sc_field_3_;
   var $agenda_;
   var $rce_;
   var $indicaciones_;
   var $dental_;
   var $sc_field_4_;
   var $sc_field_5_;
   var $rce_1_;
   var $indicaciones_1_;
   var $sc_field_6_;
   var $rce_2_;
   var $indicaciones_2_;
   var $triage_;
   var $sc_field_7_;
   var $sc_field_8_;
   var $sc_field_9_;
   var $dispensacion_;
   var $sc_field_10_;
   var $laboratorio_;
   var $sc_field_11_;
   var $sc_field_12_;
   var $erp_;
   var $pabellon_;
   var $maternidad_;
   var $archivo_;
   var $lme_;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_tbl_georref = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = true;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['agenda_']))
          {
              $this->agenda_ = $this->NM_ajax_info['param']['agenda_'];
          }
          if (isset($this->NM_ajax_info['param']['archivo_']))
          {
              $this->archivo_ = $this->NM_ajax_info['param']['archivo_'];
          }
          if (isset($this->NM_ajax_info['param']['comuna_']))
          {
              $this->comuna_ = $this->NM_ajax_info['param']['comuna_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['dental_']))
          {
              $this->dental_ = $this->NM_ajax_info['param']['dental_'];
          }
          if (isset($this->NM_ajax_info['param']['dispensacion_']))
          {
              $this->dispensacion_ = $this->NM_ajax_info['param']['dispensacion_'];
          }
          if (isset($this->NM_ajax_info['param']['erp_']))
          {
              $this->erp_ = $this->NM_ajax_info['param']['erp_'];
          }
          if (isset($this->NM_ajax_info['param']['id_']))
          {
              $this->id_ = $this->NM_ajax_info['param']['id_'];
          }
          if (isset($this->NM_ajax_info['param']['indicaciones_']))
          {
              $this->indicaciones_ = $this->NM_ajax_info['param']['indicaciones_'];
          }
          if (isset($this->NM_ajax_info['param']['indicaciones_1_']))
          {
              $this->indicaciones_1_ = $this->NM_ajax_info['param']['indicaciones_1_'];
          }
          if (isset($this->NM_ajax_info['param']['indicaciones_2_']))
          {
              $this->indicaciones_2_ = $this->NM_ajax_info['param']['indicaciones_2_'];
          }
          if (isset($this->NM_ajax_info['param']['laboratorio_']))
          {
              $this->laboratorio_ = $this->NM_ajax_info['param']['laboratorio_'];
          }
          if (isset($this->NM_ajax_info['param']['lme_']))
          {
              $this->lme_ = $this->NM_ajax_info['param']['lme_'];
          }
          if (isset($this->NM_ajax_info['param']['maternidad_']))
          {
              $this->maternidad_ = $this->NM_ajax_info['param']['maternidad_'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['pabellon_']))
          {
              $this->pabellon_ = $this->NM_ajax_info['param']['pabellon_'];
          }
          if (isset($this->NM_ajax_info['param']['rce_']))
          {
              $this->rce_ = $this->NM_ajax_info['param']['rce_'];
          }
          if (isset($this->NM_ajax_info['param']['rce_1_']))
          {
              $this->rce_1_ = $this->NM_ajax_info['param']['rce_1_'];
          }
          if (isset($this->NM_ajax_info['param']['rce_2_']))
          {
              $this->rce_2_ = $this->NM_ajax_info['param']['rce_2_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_0_']))
          {
              $this->sc_field_0_ = $this->NM_ajax_info['param']['sc_field_0_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_10_']))
          {
              $this->sc_field_10_ = $this->NM_ajax_info['param']['sc_field_10_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_11_']))
          {
              $this->sc_field_11_ = $this->NM_ajax_info['param']['sc_field_11_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_12_']))
          {
              $this->sc_field_12_ = $this->NM_ajax_info['param']['sc_field_12_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_1_']))
          {
              $this->sc_field_1_ = $this->NM_ajax_info['param']['sc_field_1_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_2_']))
          {
              $this->sc_field_2_ = $this->NM_ajax_info['param']['sc_field_2_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_3_']))
          {
              $this->sc_field_3_ = $this->NM_ajax_info['param']['sc_field_3_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_4_']))
          {
              $this->sc_field_4_ = $this->NM_ajax_info['param']['sc_field_4_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_5_']))
          {
              $this->sc_field_5_ = $this->NM_ajax_info['param']['sc_field_5_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_6_']))
          {
              $this->sc_field_6_ = $this->NM_ajax_info['param']['sc_field_6_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_7_']))
          {
              $this->sc_field_7_ = $this->NM_ajax_info['param']['sc_field_7_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_8_']))
          {
              $this->sc_field_8_ = $this->NM_ajax_info['param']['sc_field_8_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_9_']))
          {
              $this->sc_field_9_ = $this->NM_ajax_info['param']['sc_field_9_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['triage_']))
          {
              $this->triage_ = $this->NM_ajax_info['param']['triage_'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      $this->sc_conv_var['id'] = "id_";
      $this->sc_conv_var['codigo deis nuevo'] = "sc_field_0_";
      $this->sc_conv_var['codigo deis antiguo'] = "sc_field_1_";
      $this->sc_conv_var['comuna'] = "comuna_";
      $this->sc_conv_var['nivel de atencion'] = "sc_field_2_";
      $this->sc_conv_var['nombre oficial'] = "sc_field_3_";
      $this->sc_conv_var['agenda'] = "agenda_";
      $this->sc_conv_var['rce'] = "rce_";
      $this->sc_conv_var['indicaciones'] = "indicaciones_";
      $this->sc_conv_var['dental'] = "dental_";
      $this->sc_conv_var['registro/admision'] = "sc_field_4_";
      $this->sc_conv_var['administracion de camas'] = "sc_field_5_";
      $this->sc_conv_var['rce_1'] = "rce_1_";
      $this->sc_conv_var['indicaciones_1'] = "indicaciones_1_";
      $this->sc_conv_var['registro/admision_1'] = "sc_field_6_";
      $this->sc_conv_var['rce_2'] = "rce_2_";
      $this->sc_conv_var['indicaciones_2'] = "indicaciones_2_";
      $this->sc_conv_var['triage'] = "triage_";
      $this->sc_conv_var['mapa de piso'] = "sc_field_7_";
      $this->sc_conv_var['solicitud de camas'] = "sc_field_8_";
      $this->sc_conv_var['alta pacientes'] = "sc_field_9_";
      $this->sc_conv_var['dispensacion'] = "dispensacion_";
      $this->sc_conv_var['control stock'] = "sc_field_10_";
      $this->sc_conv_var['laboratorio'] = "laboratorio_";
      $this->sc_conv_var['ris/pacs'] = "sc_field_11_";
      $this->sc_conv_var['validacion fonasa'] = "sc_field_12_";
      $this->sc_conv_var['erp'] = "erp_";
      $this->sc_conv_var['pabellon'] = "pabellon_";
      $this->sc_conv_var['maternidad'] = "maternidad_";
      $this->sc_conv_var['archivo'] = "archivo_";
      $this->sc_conv_var['lme'] = "lme_";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_tbl_georref($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 if ($cadapar[0] == "id_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "id = " . $this->id_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbl_georref_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbl_georref']['upload_field_info'] = array();

      $this->Ini->Init_apl_lig = array();
      $this->List_apl_lig = array('form_tbl_mapaTI'=>array('type'=>'contr', 'lab'=>'Mapa Detallado - Red Salud Occidente', 'hint'=>'', 'img_on'=>'', 'img_off'=>''));
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_modal']))
      {
          foreach ($this->List_apl_lig as $apl_name => $Lig_parms)
          {
              if (!isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name]))
              {
                  $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name] = rand(2, 10000);
              }
              $this->Ini->Init_apl_lig[$apl_name]['ini']     = "&script_case_init=" . $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name];
              $this->Ini->Init_apl_lig[$apl_name]['type']    = $Lig_parms['type'];
              $this->Ini->Init_apl_lig[$apl_name]['lab']     = $Lig_parms['lab'];
              $this->Ini->Init_apl_lig[$apl_name]['hint']    = $Lig_parms['hint'];
              $this->Ini->Init_apl_lig[$apl_name]['img_on']  = $Lig_parms['img_on'];
              $this->Ini->Init_apl_lig[$apl_name]['img_off'] = $Lig_parms['img_off'];
          }
      }
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbl_georref']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbl_georref'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbl_georref']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbl_georref']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbl_georref') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbl_georref']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - georref";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbl_georref")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "Georef";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status      = "scFormInputErrorMult";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['mapa_ti']['hint']             = "";
      $this->arr_buttons['mapa_ti']['type']             = "button";
      $this->arr_buttons['mapa_ti']['value']            = "Visualizar Mapa";
      $this->arr_buttons['mapa_ti']['display']          = "only_text";
      $this->arr_buttons['mapa_ti']['display_position'] = "text_right";
      $this->arr_buttons['mapa_ti']['style']            = "default";
      $this->arr_buttons['mapa_ti']['image']            = "";

      $this->arr_buttons['volver']['hint']             = "";
      $this->arr_buttons['volver']['type']             = "button";
      $this->arr_buttons['volver']['value']            = "Volver";
      $this->arr_buttons['volver']['display']          = "only_text";
      $this->arr_buttons['volver']['display_position'] = "text_right";
      $this->arr_buttons['volver']['style']            = "default";
      $this->arr_buttons['volver']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_tbl_georref']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbl_georref'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "on";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      }
      $this->nmgp_botoes['mapa_ti'] = "on";
      $this->nmgp_botoes['Volver'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbl_georref']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbl_georref", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'form_tbl_georref_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbl_georref_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_tbl_georref/form_tbl_georref_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbl_georref_erro.class.php"); 
      }
      $this->Erro      = new form_tbl_georref_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao']))
         { 
             if ($this->id_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['mapa_ti'] = "on";
          $this->nmgp_botoes['Volver'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['mapa_ti'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['botoes']['mapa_ti'];
          $this->nmgp_botoes['Volver'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['botoes']['Volver'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "Volver")
          { 
              $this->sc_btn_Volver();
          } 
          $this->NM_close_db(); 
          exit;
      } 
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id_
      $this->field_config['id_']               = array();
      $this->field_config['id_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_']['symbol_dec'] = '';
      $this->field_config['id_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_max_reg'] = $this->nmgp_max_line;
      }
      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_tbl_georref_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_tbl_georref_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->id_)) { $this->nm_limpa_alfa($this->id_); }
         if (isset($this->sc_field_0_)) { $this->nm_limpa_alfa($this->sc_field_0_); }
         if (isset($this->sc_field_1_)) { $this->nm_limpa_alfa($this->sc_field_1_); }
         if (isset($this->comuna_)) { $this->nm_limpa_alfa($this->comuna_); }
         if (isset($this->sc_field_2_)) { $this->nm_limpa_alfa($this->sc_field_2_); }
         if (isset($this->sc_field_3_)) { $this->nm_limpa_alfa($this->sc_field_3_); }
         if (isset($this->agenda_)) { $this->nm_limpa_alfa($this->agenda_); }
         if (isset($this->rce_)) { $this->nm_limpa_alfa($this->rce_); }
         if (isset($this->indicaciones_)) { $this->nm_limpa_alfa($this->indicaciones_); }
         if (isset($this->dental_)) { $this->nm_limpa_alfa($this->dental_); }
         if (isset($this->sc_field_4_)) { $this->nm_limpa_alfa($this->sc_field_4_); }
         if (isset($this->sc_field_5_)) { $this->nm_limpa_alfa($this->sc_field_5_); }
         if (isset($this->rce_1_)) { $this->nm_limpa_alfa($this->rce_1_); }
         if (isset($this->indicaciones_1_)) { $this->nm_limpa_alfa($this->indicaciones_1_); }
         if (isset($this->sc_field_6_)) { $this->nm_limpa_alfa($this->sc_field_6_); }
         if (isset($this->rce_2_)) { $this->nm_limpa_alfa($this->rce_2_); }
         if (isset($this->indicaciones_2_)) { $this->nm_limpa_alfa($this->indicaciones_2_); }
         if (isset($this->triage_)) { $this->nm_limpa_alfa($this->triage_); }
         if (isset($this->sc_field_7_)) { $this->nm_limpa_alfa($this->sc_field_7_); }
         if (isset($this->sc_field_8_)) { $this->nm_limpa_alfa($this->sc_field_8_); }
         if (isset($this->sc_field_9_)) { $this->nm_limpa_alfa($this->sc_field_9_); }
         if (isset($this->dispensacion_)) { $this->nm_limpa_alfa($this->dispensacion_); }
         if (isset($this->sc_field_10_)) { $this->nm_limpa_alfa($this->sc_field_10_); }
         if (isset($this->laboratorio_)) { $this->nm_limpa_alfa($this->laboratorio_); }
         if (isset($this->sc_field_11_)) { $this->nm_limpa_alfa($this->sc_field_11_); }
         if (isset($this->sc_field_12_)) { $this->nm_limpa_alfa($this->sc_field_12_); }
         if (isset($this->erp_)) { $this->nm_limpa_alfa($this->erp_); }
         if (isset($this->pabellon_)) { $this->nm_limpa_alfa($this->pabellon_); }
         if (isset($this->maternidad_)) { $this->nm_limpa_alfa($this->maternidad_); }
         if (isset($this->archivo_)) { $this->nm_limpa_alfa($this->archivo_); }
         if (isset($this->lme_)) { $this->nm_limpa_alfa($this->lme_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_form'][$sc_seq_vert];
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_tbl_georref']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbl_georref']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_tbl_georref'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_tbl_georref'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_tbl_georref'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_tbl_georref'][] = $this->Campos_Mens_erro;
                  }
                  $this->NM_gera_nav_page(); 
                  $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
         form_tbl_georref_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_id_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_');
          }
          if ('validate_sc_field_0_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_0_');
          }
          if ('validate_sc_field_1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_1_');
          }
          if ('validate_comuna_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'comuna_');
          }
          if ('validate_sc_field_2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_2_');
          }
          if ('validate_sc_field_3_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_3_');
          }
          if ('validate_agenda_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agenda_');
          }
          if ('validate_rce_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rce_');
          }
          if ('validate_indicaciones_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'indicaciones_');
          }
          if ('validate_dental_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dental_');
          }
          if ('validate_sc_field_4_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_4_');
          }
          if ('validate_sc_field_5_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_5_');
          }
          if ('validate_rce_1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rce_1_');
          }
          if ('validate_indicaciones_1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'indicaciones_1_');
          }
          if ('validate_sc_field_6_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_6_');
          }
          if ('validate_rce_2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rce_2_');
          }
          if ('validate_indicaciones_2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'indicaciones_2_');
          }
          if ('validate_triage_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'triage_');
          }
          if ('validate_sc_field_7_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_7_');
          }
          if ('validate_sc_field_8_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_8_');
          }
          if ('validate_sc_field_9_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_9_');
          }
          if ('validate_dispensacion_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dispensacion_');
          }
          if ('validate_sc_field_10_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_10_');
          }
          if ('validate_laboratorio_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'laboratorio_');
          }
          if ('validate_sc_field_11_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_11_');
          }
          if ('validate_sc_field_12_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_12_');
          }
          if ('validate_erp_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'erp_');
          }
          if ('validate_pabellon_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pabellon_');
          }
          if ('validate_maternidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'maternidad_');
          }
          if ('validate_archivo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'archivo_');
          }
          if ('validate_lme_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lme_');
          }
          form_tbl_georref_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->id_ = $GLOBALS["id_" . $sc_seq_vert]; 
         $this->sc_field_0_ = $GLOBALS["sc_field_0_" . $sc_seq_vert]; 
         $this->sc_field_1_ = $GLOBALS["sc_field_1_" . $sc_seq_vert]; 
         $this->comuna_ = $GLOBALS["comuna_" . $sc_seq_vert]; 
         $this->sc_field_2_ = $GLOBALS["sc_field_2_" . $sc_seq_vert]; 
         $this->sc_field_3_ = $GLOBALS["sc_field_3_" . $sc_seq_vert]; 
         $this->agenda_ = $GLOBALS["agenda_" . $sc_seq_vert]; 
         $this->rce_ = $GLOBALS["rce_" . $sc_seq_vert]; 
         $this->indicaciones_ = $GLOBALS["indicaciones_" . $sc_seq_vert]; 
         $this->dental_ = $GLOBALS["dental_" . $sc_seq_vert]; 
         $this->sc_field_4_ = $GLOBALS["sc_field_4_" . $sc_seq_vert]; 
         $this->sc_field_5_ = $GLOBALS["sc_field_5_" . $sc_seq_vert]; 
         $this->rce_1_ = $GLOBALS["rce_1_" . $sc_seq_vert]; 
         $this->indicaciones_1_ = $GLOBALS["indicaciones_1_" . $sc_seq_vert]; 
         $this->sc_field_6_ = $GLOBALS["sc_field_6_" . $sc_seq_vert]; 
         $this->rce_2_ = $GLOBALS["rce_2_" . $sc_seq_vert]; 
         $this->indicaciones_2_ = $GLOBALS["indicaciones_2_" . $sc_seq_vert]; 
         $this->triage_ = $GLOBALS["triage_" . $sc_seq_vert]; 
         $this->sc_field_7_ = $GLOBALS["sc_field_7_" . $sc_seq_vert]; 
         $this->sc_field_8_ = $GLOBALS["sc_field_8_" . $sc_seq_vert]; 
         $this->sc_field_9_ = $GLOBALS["sc_field_9_" . $sc_seq_vert]; 
         $this->dispensacion_ = $GLOBALS["dispensacion_" . $sc_seq_vert]; 
         $this->sc_field_10_ = $GLOBALS["sc_field_10_" . $sc_seq_vert]; 
         $this->laboratorio_ = $GLOBALS["laboratorio_" . $sc_seq_vert]; 
         $this->sc_field_11_ = $GLOBALS["sc_field_11_" . $sc_seq_vert]; 
         $this->sc_field_12_ = $GLOBALS["sc_field_12_" . $sc_seq_vert]; 
         $this->erp_ = $GLOBALS["erp_" . $sc_seq_vert]; 
         $this->pabellon_ = $GLOBALS["pabellon_" . $sc_seq_vert]; 
         $this->maternidad_ = $GLOBALS["maternidad_" . $sc_seq_vert]; 
         $this->archivo_ = $GLOBALS["archivo_" . $sc_seq_vert]; 
         $this->lme_ = $GLOBALS["lme_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_form'][$sc_seq_vert];
         }
         if (isset($this->id_)) { $this->nm_limpa_alfa($this->id_); }
         if (isset($this->sc_field_0_)) { $this->nm_limpa_alfa($this->sc_field_0_); }
         if (isset($this->sc_field_1_)) { $this->nm_limpa_alfa($this->sc_field_1_); }
         if (isset($this->comuna_)) { $this->nm_limpa_alfa($this->comuna_); }
         if (isset($this->sc_field_2_)) { $this->nm_limpa_alfa($this->sc_field_2_); }
         if (isset($this->sc_field_3_)) { $this->nm_limpa_alfa($this->sc_field_3_); }
         if (isset($this->agenda_)) { $this->nm_limpa_alfa($this->agenda_); }
         if (isset($this->rce_)) { $this->nm_limpa_alfa($this->rce_); }
         if (isset($this->indicaciones_)) { $this->nm_limpa_alfa($this->indicaciones_); }
         if (isset($this->dental_)) { $this->nm_limpa_alfa($this->dental_); }
         if (isset($this->sc_field_4_)) { $this->nm_limpa_alfa($this->sc_field_4_); }
         if (isset($this->sc_field_5_)) { $this->nm_limpa_alfa($this->sc_field_5_); }
         if (isset($this->rce_1_)) { $this->nm_limpa_alfa($this->rce_1_); }
         if (isset($this->indicaciones_1_)) { $this->nm_limpa_alfa($this->indicaciones_1_); }
         if (isset($this->sc_field_6_)) { $this->nm_limpa_alfa($this->sc_field_6_); }
         if (isset($this->rce_2_)) { $this->nm_limpa_alfa($this->rce_2_); }
         if (isset($this->indicaciones_2_)) { $this->nm_limpa_alfa($this->indicaciones_2_); }
         if (isset($this->triage_)) { $this->nm_limpa_alfa($this->triage_); }
         if (isset($this->sc_field_7_)) { $this->nm_limpa_alfa($this->sc_field_7_); }
         if (isset($this->sc_field_8_)) { $this->nm_limpa_alfa($this->sc_field_8_); }
         if (isset($this->sc_field_9_)) { $this->nm_limpa_alfa($this->sc_field_9_); }
         if (isset($this->dispensacion_)) { $this->nm_limpa_alfa($this->dispensacion_); }
         if (isset($this->sc_field_10_)) { $this->nm_limpa_alfa($this->sc_field_10_); }
         if (isset($this->laboratorio_)) { $this->nm_limpa_alfa($this->laboratorio_); }
         if (isset($this->sc_field_11_)) { $this->nm_limpa_alfa($this->sc_field_11_); }
         if (isset($this->sc_field_12_)) { $this->nm_limpa_alfa($this->sc_field_12_); }
         if (isset($this->erp_)) { $this->nm_limpa_alfa($this->erp_); }
         if (isset($this->pabellon_)) { $this->nm_limpa_alfa($this->pabellon_); }
         if (isset($this->maternidad_)) { $this->nm_limpa_alfa($this->maternidad_); }
         if (isset($this->archivo_)) { $this->nm_limpa_alfa($this->archivo_); }
         if (isset($this->lme_)) { $this->nm_limpa_alfa($this->lme_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['id_'] =  $this->id_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_0_'] =  $this->sc_field_0_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_1_'] =  $this->sc_field_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['comuna_'] =  $this->comuna_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_2_'] =  $this->sc_field_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_3_'] =  $this->sc_field_3_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['agenda_'] =  $this->agenda_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_'] =  $this->rce_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_'] =  $this->indicaciones_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['dental_'] =  $this->dental_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_4_'] =  $this->sc_field_4_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_5_'] =  $this->sc_field_5_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_1_'] =  $this->rce_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_1_'] =  $this->indicaciones_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_6_'] =  $this->sc_field_6_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_2_'] =  $this->rce_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_2_'] =  $this->indicaciones_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['triage_'] =  $this->triage_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_7_'] =  $this->sc_field_7_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_8_'] =  $this->sc_field_8_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_9_'] =  $this->sc_field_9_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['dispensacion_'] =  $this->dispensacion_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_10_'] =  $this->sc_field_10_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['laboratorio_'] =  $this->laboratorio_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_11_'] =  $this->sc_field_11_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_12_'] =  $this->sc_field_12_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['erp_'] =  $this->erp_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['pabellon_'] =  $this->pabellon_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['maternidad_'] =  $this->maternidad_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['archivo_'] =  $this->archivo_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['lme_'] =  $this->lme_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && (!$this->NM_ajax_flag || 'event_' != substr($this->NM_ajax_opcao, 0, 6))) 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt || $this->sc_teve_excl) 
          { 
              $this->sc_after_all_update = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_tbl_georref_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_tbl_georref);
          $this->NM_ajax_info['fldList']['id_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['id_']);
          $this->NM_close_db();
          form_tbl_georref_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_scajaxbutton_volver_onclick' == $this->NM_ajax_opcao)
          {
              $this->scajaxbutton_Volver_onClick();
          }
          $this->NM_close_db();
          form_tbl_georref_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbl_georref_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_tbl_georref']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'id_':
               return "Id";
               break;
           case 'sc_field_0_':
               return "Codigo Deis Nuevo";
               break;
           case 'sc_field_1_':
               return "Codigo Deis Antiguo";
               break;
           case 'comuna_':
               return "COMUNA";
               break;
           case 'sc_field_2_':
               return "Nivel De Atencion";
               break;
           case 'sc_field_3_':
               return "Nombre Oficial";
               break;
           case 'agenda_':
               return "Agenda";
               break;
           case 'rce_':
               return "RCE";
               break;
           case 'indicaciones_':
               return "Indicaciones";
               break;
           case 'dental_':
               return "Dental";
               break;
           case 'sc_field_4_':
               return "Registro / Admision";
               break;
           case 'sc_field_5_':
               return "Administracion De Camas";
               break;
           case 'rce_1_':
               return "RCE 1";
               break;
           case 'indicaciones_1_':
               return "Indicaciones 1";
               break;
           case 'sc_field_6_':
               return "Registro / Admision 1";
               break;
           case 'rce_2_':
               return "RCE 2";
               break;
           case 'indicaciones_2_':
               return "Indicaciones 2";
               break;
           case 'triage_':
               return "Triage";
               break;
           case 'sc_field_7_':
               return "Mapa De Piso";
               break;
           case 'sc_field_8_':
               return "Solicitud De Camas";
               break;
           case 'sc_field_9_':
               return "Alta Pacientes";
               break;
           case 'dispensacion_':
               return "Dispensacion";
               break;
           case 'sc_field_10_':
               return "Control Stock";
               break;
           case 'laboratorio_':
               return "Laboratorio";
               break;
           case 'sc_field_11_':
               return "RIS/PACS";
               break;
           case 'sc_field_12_':
               return "Validacion FONASA";
               break;
           case 'erp_':
               return "ERP";
               break;
           case 'pabellon_':
               return "Pabellon";
               break;
           case 'maternidad_':
               return "Maternidad";
               break;
           case 'archivo_':
               return "Archivo";
               break;
           case 'lme_':
               return "LME";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbl_georref']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbl_georref']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbl_georref'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbl_georref'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_' == $filtro)
        $this->ValidateField_id_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_0_' == $filtro)
        $this->ValidateField_sc_field_0_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_1_' == $filtro)
        $this->ValidateField_sc_field_1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'comuna_' == $filtro)
        $this->ValidateField_comuna_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_2_' == $filtro)
        $this->ValidateField_sc_field_2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_3_' == $filtro)
        $this->ValidateField_sc_field_3_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agenda_' == $filtro)
        $this->ValidateField_agenda_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rce_' == $filtro)
        $this->ValidateField_rce_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'indicaciones_' == $filtro)
        $this->ValidateField_indicaciones_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dental_' == $filtro)
        $this->ValidateField_dental_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_4_' == $filtro)
        $this->ValidateField_sc_field_4_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_5_' == $filtro)
        $this->ValidateField_sc_field_5_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rce_1_' == $filtro)
        $this->ValidateField_rce_1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'indicaciones_1_' == $filtro)
        $this->ValidateField_indicaciones_1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_6_' == $filtro)
        $this->ValidateField_sc_field_6_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rce_2_' == $filtro)
        $this->ValidateField_rce_2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'indicaciones_2_' == $filtro)
        $this->ValidateField_indicaciones_2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'triage_' == $filtro)
        $this->ValidateField_triage_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_7_' == $filtro)
        $this->ValidateField_sc_field_7_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_8_' == $filtro)
        $this->ValidateField_sc_field_8_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_9_' == $filtro)
        $this->ValidateField_sc_field_9_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dispensacion_' == $filtro)
        $this->ValidateField_dispensacion_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_10_' == $filtro)
        $this->ValidateField_sc_field_10_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'laboratorio_' == $filtro)
        $this->ValidateField_laboratorio_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_11_' == $filtro)
        $this->ValidateField_sc_field_11_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_12_' == $filtro)
        $this->ValidateField_sc_field_12_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'erp_' == $filtro)
        $this->ValidateField_erp_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pabellon_' == $filtro)
        $this->ValidateField_pabellon_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'maternidad_' == $filtro)
        $this->ValidateField_maternidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'archivo_' == $filtro)
        $this->ValidateField_archivo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lme_' == $filtro)
        $this->ValidateField_lme_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_id_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_ == "")  
      { 
          $this->id_ = 0;
      } 
      nm_limpa_numero($this->id_, $this->field_config['id_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id_ != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->id_) > $iTestSize)  
              { 
                  $Campos_Crit .= "Id: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_']))
                  {
                      $Campos_Erros['id_'] = array();
                  }
                  $Campos_Erros['id_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_']) || !is_array($this->NM_ajax_info['errList']['id_']))
                  {
                      $this->NM_ajax_info['errList']['id_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_, 10, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Id; " ; 
                  if (!isset($Campos_Erros['id_']))
                  {
                      $Campos_Erros['id_'] = array();
                  }
                  $Campos_Erros['id_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_']) || !is_array($this->NM_ajax_info['errList']['id_']))
                  {
                      $this->NM_ajax_info['errList']['id_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_

    function ValidateField_sc_field_0_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_0_) > 50) 
          { 
              $Campos_Crit .= "Codigo Deis Nuevo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_0_']))
              {
                  $Campos_Erros['sc_field_0_'] = array();
              }
              $Campos_Erros['sc_field_0_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_0_']) || !is_array($this->NM_ajax_info['errList']['sc_field_0_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_0_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_0_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_0_

    function ValidateField_sc_field_1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_1_) > 50) 
          { 
              $Campos_Crit .= "Codigo Deis Antiguo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_1_']))
              {
                  $Campos_Erros['sc_field_1_'] = array();
              }
              $Campos_Erros['sc_field_1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_1_']) || !is_array($this->NM_ajax_info['errList']['sc_field_1_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_1_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_1_

    function ValidateField_comuna_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->comuna_) > 50) 
          { 
              $Campos_Crit .= "COMUNA " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['comuna_']))
              {
                  $Campos_Erros['comuna_'] = array();
              }
              $Campos_Erros['comuna_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['comuna_']) || !is_array($this->NM_ajax_info['errList']['comuna_']))
              {
                  $this->NM_ajax_info['errList']['comuna_'] = array();
              }
              $this->NM_ajax_info['errList']['comuna_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_comuna_

    function ValidateField_sc_field_2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_2_) > 50) 
          { 
              $Campos_Crit .= "Nivel De Atencion " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_2_']))
              {
                  $Campos_Erros['sc_field_2_'] = array();
              }
              $Campos_Erros['sc_field_2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_2_']) || !is_array($this->NM_ajax_info['errList']['sc_field_2_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_2_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_2_

    function ValidateField_sc_field_3_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_3_) > 99) 
          { 
              $Campos_Crit .= "Nombre Oficial " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 99 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_3_']))
              {
                  $Campos_Erros['sc_field_3_'] = array();
              }
              $Campos_Erros['sc_field_3_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 99 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_3_']) || !is_array($this->NM_ajax_info['errList']['sc_field_3_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_3_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_3_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 99 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_3_

    function ValidateField_agenda_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->agenda_) > 50) 
          { 
              $Campos_Crit .= "Agenda " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['agenda_']))
              {
                  $Campos_Erros['agenda_'] = array();
              }
              $Campos_Erros['agenda_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['agenda_']) || !is_array($this->NM_ajax_info['errList']['agenda_']))
              {
                  $this->NM_ajax_info['errList']['agenda_'] = array();
              }
              $this->NM_ajax_info['errList']['agenda_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_agenda_

    function ValidateField_rce_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rce_) > 50) 
          { 
              $Campos_Crit .= "RCE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rce_']))
              {
                  $Campos_Erros['rce_'] = array();
              }
              $Campos_Erros['rce_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rce_']) || !is_array($this->NM_ajax_info['errList']['rce_']))
              {
                  $this->NM_ajax_info['errList']['rce_'] = array();
              }
              $this->NM_ajax_info['errList']['rce_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_rce_

    function ValidateField_indicaciones_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->indicaciones_) > 50) 
          { 
              $Campos_Crit .= "Indicaciones " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['indicaciones_']))
              {
                  $Campos_Erros['indicaciones_'] = array();
              }
              $Campos_Erros['indicaciones_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['indicaciones_']) || !is_array($this->NM_ajax_info['errList']['indicaciones_']))
              {
                  $this->NM_ajax_info['errList']['indicaciones_'] = array();
              }
              $this->NM_ajax_info['errList']['indicaciones_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_indicaciones_

    function ValidateField_dental_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->dental_) > 50) 
          { 
              $Campos_Crit .= "Dental " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['dental_']))
              {
                  $Campos_Erros['dental_'] = array();
              }
              $Campos_Erros['dental_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['dental_']) || !is_array($this->NM_ajax_info['errList']['dental_']))
              {
                  $this->NM_ajax_info['errList']['dental_'] = array();
              }
              $this->NM_ajax_info['errList']['dental_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_dental_

    function ValidateField_sc_field_4_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_4_) > 50) 
          { 
              $Campos_Crit .= "Registro / Admision " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_4_']))
              {
                  $Campos_Erros['sc_field_4_'] = array();
              }
              $Campos_Erros['sc_field_4_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_4_']) || !is_array($this->NM_ajax_info['errList']['sc_field_4_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_4_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_4_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_4_

    function ValidateField_sc_field_5_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_5_) > 50) 
          { 
              $Campos_Crit .= "Administracion De Camas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_5_']))
              {
                  $Campos_Erros['sc_field_5_'] = array();
              }
              $Campos_Erros['sc_field_5_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_5_']) || !is_array($this->NM_ajax_info['errList']['sc_field_5_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_5_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_5_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_5_

    function ValidateField_rce_1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rce_1_) > 50) 
          { 
              $Campos_Crit .= "RCE 1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rce_1_']))
              {
                  $Campos_Erros['rce_1_'] = array();
              }
              $Campos_Erros['rce_1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rce_1_']) || !is_array($this->NM_ajax_info['errList']['rce_1_']))
              {
                  $this->NM_ajax_info['errList']['rce_1_'] = array();
              }
              $this->NM_ajax_info['errList']['rce_1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_rce_1_

    function ValidateField_indicaciones_1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->indicaciones_1_) > 50) 
          { 
              $Campos_Crit .= "Indicaciones 1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['indicaciones_1_']))
              {
                  $Campos_Erros['indicaciones_1_'] = array();
              }
              $Campos_Erros['indicaciones_1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['indicaciones_1_']) || !is_array($this->NM_ajax_info['errList']['indicaciones_1_']))
              {
                  $this->NM_ajax_info['errList']['indicaciones_1_'] = array();
              }
              $this->NM_ajax_info['errList']['indicaciones_1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_indicaciones_1_

    function ValidateField_sc_field_6_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_6_) > 50) 
          { 
              $Campos_Crit .= "Registro / Admision 1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_6_']))
              {
                  $Campos_Erros['sc_field_6_'] = array();
              }
              $Campos_Erros['sc_field_6_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_6_']) || !is_array($this->NM_ajax_info['errList']['sc_field_6_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_6_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_6_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_6_

    function ValidateField_rce_2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rce_2_) > 50) 
          { 
              $Campos_Crit .= "RCE 2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rce_2_']))
              {
                  $Campos_Erros['rce_2_'] = array();
              }
              $Campos_Erros['rce_2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rce_2_']) || !is_array($this->NM_ajax_info['errList']['rce_2_']))
              {
                  $this->NM_ajax_info['errList']['rce_2_'] = array();
              }
              $this->NM_ajax_info['errList']['rce_2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_rce_2_

    function ValidateField_indicaciones_2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->indicaciones_2_) > 50) 
          { 
              $Campos_Crit .= "Indicaciones 2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['indicaciones_2_']))
              {
                  $Campos_Erros['indicaciones_2_'] = array();
              }
              $Campos_Erros['indicaciones_2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['indicaciones_2_']) || !is_array($this->NM_ajax_info['errList']['indicaciones_2_']))
              {
                  $this->NM_ajax_info['errList']['indicaciones_2_'] = array();
              }
              $this->NM_ajax_info['errList']['indicaciones_2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_indicaciones_2_

    function ValidateField_triage_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->triage_) > 50) 
          { 
              $Campos_Crit .= "Triage " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['triage_']))
              {
                  $Campos_Erros['triage_'] = array();
              }
              $Campos_Erros['triage_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['triage_']) || !is_array($this->NM_ajax_info['errList']['triage_']))
              {
                  $this->NM_ajax_info['errList']['triage_'] = array();
              }
              $this->NM_ajax_info['errList']['triage_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_triage_

    function ValidateField_sc_field_7_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_7_) > 50) 
          { 
              $Campos_Crit .= "Mapa De Piso " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_7_']))
              {
                  $Campos_Erros['sc_field_7_'] = array();
              }
              $Campos_Erros['sc_field_7_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_7_']) || !is_array($this->NM_ajax_info['errList']['sc_field_7_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_7_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_7_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_7_

    function ValidateField_sc_field_8_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_8_) > 50) 
          { 
              $Campos_Crit .= "Solicitud De Camas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_8_']))
              {
                  $Campos_Erros['sc_field_8_'] = array();
              }
              $Campos_Erros['sc_field_8_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_8_']) || !is_array($this->NM_ajax_info['errList']['sc_field_8_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_8_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_8_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_8_

    function ValidateField_sc_field_9_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_9_) > 50) 
          { 
              $Campos_Crit .= "Alta Pacientes " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_9_']))
              {
                  $Campos_Erros['sc_field_9_'] = array();
              }
              $Campos_Erros['sc_field_9_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_9_']) || !is_array($this->NM_ajax_info['errList']['sc_field_9_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_9_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_9_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_9_

    function ValidateField_dispensacion_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->dispensacion_) > 50) 
          { 
              $Campos_Crit .= "Dispensacion " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['dispensacion_']))
              {
                  $Campos_Erros['dispensacion_'] = array();
              }
              $Campos_Erros['dispensacion_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['dispensacion_']) || !is_array($this->NM_ajax_info['errList']['dispensacion_']))
              {
                  $this->NM_ajax_info['errList']['dispensacion_'] = array();
              }
              $this->NM_ajax_info['errList']['dispensacion_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_dispensacion_

    function ValidateField_sc_field_10_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_10_) > 50) 
          { 
              $Campos_Crit .= "Control Stock " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_10_']))
              {
                  $Campos_Erros['sc_field_10_'] = array();
              }
              $Campos_Erros['sc_field_10_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_10_']) || !is_array($this->NM_ajax_info['errList']['sc_field_10_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_10_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_10_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_10_

    function ValidateField_laboratorio_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->laboratorio_) > 51) 
          { 
              $Campos_Crit .= "Laboratorio " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 51 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['laboratorio_']))
              {
                  $Campos_Erros['laboratorio_'] = array();
              }
              $Campos_Erros['laboratorio_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 51 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['laboratorio_']) || !is_array($this->NM_ajax_info['errList']['laboratorio_']))
              {
                  $this->NM_ajax_info['errList']['laboratorio_'] = array();
              }
              $this->NM_ajax_info['errList']['laboratorio_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 51 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_laboratorio_

    function ValidateField_sc_field_11_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_11_) > 50) 
          { 
              $Campos_Crit .= "RIS/PACS " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_11_']))
              {
                  $Campos_Erros['sc_field_11_'] = array();
              }
              $Campos_Erros['sc_field_11_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_11_']) || !is_array($this->NM_ajax_info['errList']['sc_field_11_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_11_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_11_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_11_

    function ValidateField_sc_field_12_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sc_field_12_) > 50) 
          { 
              $Campos_Crit .= "Validacion FONASA " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sc_field_12_']))
              {
                  $Campos_Erros['sc_field_12_'] = array();
              }
              $Campos_Erros['sc_field_12_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sc_field_12_']) || !is_array($this->NM_ajax_info['errList']['sc_field_12_']))
              {
                  $this->NM_ajax_info['errList']['sc_field_12_'] = array();
              }
              $this->NM_ajax_info['errList']['sc_field_12_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sc_field_12_

    function ValidateField_erp_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->erp_) > 50) 
          { 
              $Campos_Crit .= "ERP " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['erp_']))
              {
                  $Campos_Erros['erp_'] = array();
              }
              $Campos_Erros['erp_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['erp_']) || !is_array($this->NM_ajax_info['errList']['erp_']))
              {
                  $this->NM_ajax_info['errList']['erp_'] = array();
              }
              $this->NM_ajax_info['errList']['erp_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_erp_

    function ValidateField_pabellon_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pabellon_) > 50) 
          { 
              $Campos_Crit .= "Pabellon " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pabellon_']))
              {
                  $Campos_Erros['pabellon_'] = array();
              }
              $Campos_Erros['pabellon_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pabellon_']) || !is_array($this->NM_ajax_info['errList']['pabellon_']))
              {
                  $this->NM_ajax_info['errList']['pabellon_'] = array();
              }
              $this->NM_ajax_info['errList']['pabellon_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_pabellon_

    function ValidateField_maternidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->maternidad_) > 50) 
          { 
              $Campos_Crit .= "Maternidad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['maternidad_']))
              {
                  $Campos_Erros['maternidad_'] = array();
              }
              $Campos_Erros['maternidad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['maternidad_']) || !is_array($this->NM_ajax_info['errList']['maternidad_']))
              {
                  $this->NM_ajax_info['errList']['maternidad_'] = array();
              }
              $this->NM_ajax_info['errList']['maternidad_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_maternidad_

    function ValidateField_archivo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->archivo_) > 50) 
          { 
              $Campos_Crit .= "Archivo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['archivo_']))
              {
                  $Campos_Erros['archivo_'] = array();
              }
              $Campos_Erros['archivo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['archivo_']) || !is_array($this->NM_ajax_info['errList']['archivo_']))
              {
                  $this->NM_ajax_info['errList']['archivo_'] = array();
              }
              $this->NM_ajax_info['errList']['archivo_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_archivo_

    function ValidateField_lme_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lme_) > 50) 
          { 
              $Campos_Crit .= "LME " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lme_']))
              {
                  $Campos_Erros['lme_'] = array();
              }
              $Campos_Erros['lme_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lme_']) || !is_array($this->NM_ajax_info['errList']['lme_']))
              {
                  $this->NM_ajax_info['errList']['lme_'] = array();
              }
              $this->NM_ajax_info['errList']['lme_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_lme_

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['id_'] = $this->id_;
    $this->nmgp_dados_form['sc_field_0_'] = $this->sc_field_0_;
    $this->nmgp_dados_form['sc_field_1_'] = $this->sc_field_1_;
    $this->nmgp_dados_form['comuna_'] = $this->comuna_;
    $this->nmgp_dados_form['sc_field_2_'] = $this->sc_field_2_;
    $this->nmgp_dados_form['sc_field_3_'] = $this->sc_field_3_;
    $this->nmgp_dados_form['agenda_'] = $this->agenda_;
    $this->nmgp_dados_form['rce_'] = $this->rce_;
    $this->nmgp_dados_form['indicaciones_'] = $this->indicaciones_;
    $this->nmgp_dados_form['dental_'] = $this->dental_;
    $this->nmgp_dados_form['sc_field_4_'] = $this->sc_field_4_;
    $this->nmgp_dados_form['sc_field_5_'] = $this->sc_field_5_;
    $this->nmgp_dados_form['rce_1_'] = $this->rce_1_;
    $this->nmgp_dados_form['indicaciones_1_'] = $this->indicaciones_1_;
    $this->nmgp_dados_form['sc_field_6_'] = $this->sc_field_6_;
    $this->nmgp_dados_form['rce_2_'] = $this->rce_2_;
    $this->nmgp_dados_form['indicaciones_2_'] = $this->indicaciones_2_;
    $this->nmgp_dados_form['triage_'] = $this->triage_;
    $this->nmgp_dados_form['sc_field_7_'] = $this->sc_field_7_;
    $this->nmgp_dados_form['sc_field_8_'] = $this->sc_field_8_;
    $this->nmgp_dados_form['sc_field_9_'] = $this->sc_field_9_;
    $this->nmgp_dados_form['dispensacion_'] = $this->dispensacion_;
    $this->nmgp_dados_form['sc_field_10_'] = $this->sc_field_10_;
    $this->nmgp_dados_form['laboratorio_'] = $this->laboratorio_;
    $this->nmgp_dados_form['sc_field_11_'] = $this->sc_field_11_;
    $this->nmgp_dados_form['sc_field_12_'] = $this->sc_field_12_;
    $this->nmgp_dados_form['erp_'] = $this->erp_;
    $this->nmgp_dados_form['pabellon_'] = $this->pabellon_;
    $this->nmgp_dados_form['maternidad_'] = $this->maternidad_;
    $this->nmgp_dados_form['archivo_'] = $this->archivo_;
    $this->nmgp_dados_form['lme_'] = $this->lme_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id_, $this->field_config['id_']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "id_")
      {
          nm_limpa_numero($this->id_, $this->field_config['id_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if (!empty($this->id_) || (!empty($format_fields) && isset($format_fields['id_'])))
      {
          nmgp_Form_Num_Val($this->id_, $this->field_config['id_']['symbol_grp'], $this->field_config['id_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_']['keyVal'] = form_tbl_georref_pack_protect_string($this->nmgp_dados_form['id_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['id_']) && $this->NM_ajax_changed['id_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['id_'] = $this->id_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_0_']) && $this->NM_ajax_changed['sc_field_0_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_0_'] = $this->sc_field_0_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_1_']) && $this->NM_ajax_changed['sc_field_1_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_1_'] = $this->sc_field_1_;
                  }
                  if (isset($this->NM_ajax_changed['comuna_']) && $this->NM_ajax_changed['comuna_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['comuna_'] = $this->comuna_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_2_']) && $this->NM_ajax_changed['sc_field_2_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_2_'] = $this->sc_field_2_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_3_']) && $this->NM_ajax_changed['sc_field_3_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_3_'] = $this->sc_field_3_;
                  }
                  if (isset($this->NM_ajax_changed['agenda_']) && $this->NM_ajax_changed['agenda_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['agenda_'] = $this->agenda_;
                  }
                  if (isset($this->NM_ajax_changed['rce_']) && $this->NM_ajax_changed['rce_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['rce_'] = $this->rce_;
                  }
                  if (isset($this->NM_ajax_changed['indicaciones_']) && $this->NM_ajax_changed['indicaciones_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['indicaciones_'] = $this->indicaciones_;
                  }
                  if (isset($this->NM_ajax_changed['dental_']) && $this->NM_ajax_changed['dental_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['dental_'] = $this->dental_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_4_']) && $this->NM_ajax_changed['sc_field_4_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_4_'] = $this->sc_field_4_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_5_']) && $this->NM_ajax_changed['sc_field_5_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_5_'] = $this->sc_field_5_;
                  }
                  if (isset($this->NM_ajax_changed['rce_1_']) && $this->NM_ajax_changed['rce_1_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['rce_1_'] = $this->rce_1_;
                  }
                  if (isset($this->NM_ajax_changed['indicaciones_1_']) && $this->NM_ajax_changed['indicaciones_1_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['indicaciones_1_'] = $this->indicaciones_1_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_6_']) && $this->NM_ajax_changed['sc_field_6_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_6_'] = $this->sc_field_6_;
                  }
                  if (isset($this->NM_ajax_changed['rce_2_']) && $this->NM_ajax_changed['rce_2_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['rce_2_'] = $this->rce_2_;
                  }
                  if (isset($this->NM_ajax_changed['indicaciones_2_']) && $this->NM_ajax_changed['indicaciones_2_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['indicaciones_2_'] = $this->indicaciones_2_;
                  }
                  if (isset($this->NM_ajax_changed['triage_']) && $this->NM_ajax_changed['triage_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['triage_'] = $this->triage_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_7_']) && $this->NM_ajax_changed['sc_field_7_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_7_'] = $this->sc_field_7_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_8_']) && $this->NM_ajax_changed['sc_field_8_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_8_'] = $this->sc_field_8_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_9_']) && $this->NM_ajax_changed['sc_field_9_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_9_'] = $this->sc_field_9_;
                  }
                  if (isset($this->NM_ajax_changed['dispensacion_']) && $this->NM_ajax_changed['dispensacion_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['dispensacion_'] = $this->dispensacion_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_10_']) && $this->NM_ajax_changed['sc_field_10_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_10_'] = $this->sc_field_10_;
                  }
                  if (isset($this->NM_ajax_changed['laboratorio_']) && $this->NM_ajax_changed['laboratorio_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['laboratorio_'] = $this->laboratorio_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_11_']) && $this->NM_ajax_changed['sc_field_11_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_11_'] = $this->sc_field_11_;
                  }
                  if (isset($this->NM_ajax_changed['sc_field_12_']) && $this->NM_ajax_changed['sc_field_12_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_12_'] = $this->sc_field_12_;
                  }
                  if (isset($this->NM_ajax_changed['erp_']) && $this->NM_ajax_changed['erp_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['erp_'] = $this->erp_;
                  }
                  if (isset($this->NM_ajax_changed['pabellon_']) && $this->NM_ajax_changed['pabellon_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['pabellon_'] = $this->pabellon_;
                  }
                  if (isset($this->NM_ajax_changed['maternidad_']) && $this->NM_ajax_changed['maternidad_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['maternidad_'] = $this->maternidad_;
                  }
                  if (isset($this->NM_ajax_changed['archivo_']) && $this->NM_ajax_changed['archivo_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['archivo_'] = $this->archivo_;
                  }
                  if (isset($this->NM_ajax_changed['lme_']) && $this->NM_ajax_changed['lme_'])
                  {
                      $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['lme_'] = $this->lme_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_0_'] = $this->sc_field_0_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_1_'] = $this->sc_field_1_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['comuna_'] = $this->comuna_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_2_'] = $this->sc_field_2_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_3_'] = $this->sc_field_3_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['agenda_'] = $this->agenda_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['rce_'] = $this->rce_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['indicaciones_'] = $this->indicaciones_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['dental_'] = $this->dental_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_4_'] = $this->sc_field_4_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_5_'] = $this->sc_field_5_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['rce_1_'] = $this->rce_1_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['indicaciones_1_'] = $this->indicaciones_1_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_6_'] = $this->sc_field_6_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['rce_2_'] = $this->rce_2_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['indicaciones_2_'] = $this->indicaciones_2_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['triage_'] = $this->triage_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_7_'] = $this->sc_field_7_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_8_'] = $this->sc_field_8_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_9_'] = $this->sc_field_9_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['dispensacion_'] = $this->dispensacion_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_10_'] = $this->sc_field_10_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['laboratorio_'] = $this->laboratorio_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_11_'] = $this->sc_field_11_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['sc_field_12_'] = $this->sc_field_12_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['erp_'] = $this->erp_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['pabellon_'] = $this->pabellon_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['maternidad_'] = $this->maternidad_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['archivo_'] = $this->archivo_;
              $this->form_vert_form_tbl_georref[$this->nmgp_refresh_row]['lme_'] = $this->lme_;
          }
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_tbl_georref);
          foreach($this->form_vert_form_tbl_georref as $sc_seq_vert => $aRecData)
          {
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['id_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_0_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_0_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_0_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("comuna_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['comuna_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['comuna_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_3_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_3_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_3_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agenda_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['agenda_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['agenda_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rce_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['rce_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['rce_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("indicaciones_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['indicaciones_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['indicaciones_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dental_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dental_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dental_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_4_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_4_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_4_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_5_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_5_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_5_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rce_1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['rce_1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['rce_1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("indicaciones_1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['indicaciones_1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['indicaciones_1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_6_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_6_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_6_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rce_2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['rce_2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['rce_2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("indicaciones_2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['indicaciones_2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['indicaciones_2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("triage_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['triage_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['triage_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_7_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_7_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_7_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_8_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_8_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_8_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_9_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_9_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_9_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dispensacion_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dispensacion_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dispensacion_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_10_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_10_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_10_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("laboratorio_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['laboratorio_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['laboratorio_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_11_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_11_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_11_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_12_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sc_field_12_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sc_field_12_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("erp_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['erp_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['erp_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pabellon_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['pabellon_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['pabellon_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("maternidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['maternidad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['maternidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("archivo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['archivo_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['archivo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lme_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['lme_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['lme_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $SC_tem_cmp_update = true; 
      if ($this->nmgp_opcao == "alterar")
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['id_'] == $this->id_ &&
              $this->nmgp_dados_select['sc_field_0_'] == $this->sc_field_0_ &&
              $this->nmgp_dados_select['sc_field_1_'] == $this->sc_field_1_ &&
              $this->nmgp_dados_select['comuna_'] == $this->comuna_ &&
              $this->nmgp_dados_select['sc_field_2_'] == $this->sc_field_2_ &&
              $this->nmgp_dados_select['sc_field_3_'] == $this->sc_field_3_ &&
              $this->nmgp_dados_select['agenda_'] == $this->agenda_ &&
              $this->nmgp_dados_select['rce_'] == $this->rce_ &&
              $this->nmgp_dados_select['indicaciones_'] == $this->indicaciones_ &&
              $this->nmgp_dados_select['dental_'] == $this->dental_ &&
              $this->nmgp_dados_select['sc_field_4_'] == $this->sc_field_4_ &&
              $this->nmgp_dados_select['sc_field_5_'] == $this->sc_field_5_ &&
              $this->nmgp_dados_select['rce_1_'] == $this->rce_1_ &&
              $this->nmgp_dados_select['indicaciones_1_'] == $this->indicaciones_1_ &&
              $this->nmgp_dados_select['sc_field_6_'] == $this->sc_field_6_ &&
              $this->nmgp_dados_select['rce_2_'] == $this->rce_2_ &&
              $this->nmgp_dados_select['indicaciones_2_'] == $this->indicaciones_2_ &&
              $this->nmgp_dados_select['triage_'] == $this->triage_ &&
              $this->nmgp_dados_select['sc_field_7_'] == $this->sc_field_7_ &&
              $this->nmgp_dados_select['sc_field_8_'] == $this->sc_field_8_ &&
              $this->nmgp_dados_select['sc_field_9_'] == $this->sc_field_9_ &&
              $this->nmgp_dados_select['dispensacion_'] == $this->dispensacion_ &&
              $this->nmgp_dados_select['sc_field_10_'] == $this->sc_field_10_ &&
              $this->nmgp_dados_select['laboratorio_'] == $this->laboratorio_ &&
              $this->nmgp_dados_select['sc_field_11_'] == $this->sc_field_11_ &&
              $this->nmgp_dados_select['sc_field_12_'] == $this->sc_field_12_ &&
              $this->nmgp_dados_select['erp_'] == $this->erp_ &&
              $this->nmgp_dados_select['pabellon_'] == $this->pabellon_ &&
              $this->nmgp_dados_select['maternidad_'] == $this->maternidad_ &&
              $this->nmgp_dados_select['archivo_'] == $this->archivo_ &&
              $this->nmgp_dados_select['lme_'] == $this->lme_)
          {
              $SC_ex_update = false; 
              $SC_ex_upd_or = false; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['id_'] = $this->id_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_0_'] = $this->sc_field_0_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_1_'] = $this->sc_field_1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['comuna_'] = $this->comuna_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_2_'] = $this->sc_field_2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_3_'] = $this->sc_field_3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['agenda_'] = $this->agenda_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['rce_'] = $this->rce_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['indicaciones_'] = $this->indicaciones_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['dental_'] = $this->dental_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_4_'] = $this->sc_field_4_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_5_'] = $this->sc_field_5_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['rce_1_'] = $this->rce_1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['indicaciones_1_'] = $this->indicaciones_1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_6_'] = $this->sc_field_6_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['rce_2_'] = $this->rce_2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['indicaciones_2_'] = $this->indicaciones_2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['triage_'] = $this->triage_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_7_'] = $this->sc_field_7_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_8_'] = $this->sc_field_8_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_9_'] = $this->sc_field_9_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['dispensacion_'] = $this->dispensacion_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_10_'] = $this->sc_field_10_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['laboratorio_'] = $this->laboratorio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_11_'] = $this->sc_field_11_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_12_'] = $this->sc_field_12_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['erp_'] = $this->erp_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['pabellon_'] = $this->pabellon_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['maternidad_'] = $this->maternidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['archivo_'] = $this->archivo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['lme_'] = $this->lme_;
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['id_'] = $this->id_;
      $NM_val_form['sc_field_0_'] = $this->sc_field_0_;
      $NM_val_form['sc_field_1_'] = $this->sc_field_1_;
      $NM_val_form['comuna_'] = $this->comuna_;
      $NM_val_form['sc_field_2_'] = $this->sc_field_2_;
      $NM_val_form['sc_field_3_'] = $this->sc_field_3_;
      $NM_val_form['agenda_'] = $this->agenda_;
      $NM_val_form['rce_'] = $this->rce_;
      $NM_val_form['indicaciones_'] = $this->indicaciones_;
      $NM_val_form['dental_'] = $this->dental_;
      $NM_val_form['sc_field_4_'] = $this->sc_field_4_;
      $NM_val_form['sc_field_5_'] = $this->sc_field_5_;
      $NM_val_form['rce_1_'] = $this->rce_1_;
      $NM_val_form['indicaciones_1_'] = $this->indicaciones_1_;
      $NM_val_form['sc_field_6_'] = $this->sc_field_6_;
      $NM_val_form['rce_2_'] = $this->rce_2_;
      $NM_val_form['indicaciones_2_'] = $this->indicaciones_2_;
      $NM_val_form['triage_'] = $this->triage_;
      $NM_val_form['sc_field_7_'] = $this->sc_field_7_;
      $NM_val_form['sc_field_8_'] = $this->sc_field_8_;
      $NM_val_form['sc_field_9_'] = $this->sc_field_9_;
      $NM_val_form['dispensacion_'] = $this->dispensacion_;
      $NM_val_form['sc_field_10_'] = $this->sc_field_10_;
      $NM_val_form['laboratorio_'] = $this->laboratorio_;
      $NM_val_form['sc_field_11_'] = $this->sc_field_11_;
      $NM_val_form['sc_field_12_'] = $this->sc_field_12_;
      $NM_val_form['erp_'] = $this->erp_;
      $NM_val_form['pabellon_'] = $this->pabellon_;
      $NM_val_form['maternidad_'] = $this->maternidad_;
      $NM_val_form['archivo_'] = $this->archivo_;
      $NM_val_form['lme_'] = $this->lme_;
      if ($this->id_ == "")  
      { 
          $this->id_ = 0;
      } 
      $nm_bases_lob_geral = $this->Ini->nm_bases_mysql;
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->sc_field_0__before_qstr = $this->sc_field_0_;
          $this->sc_field_0_ = substr($this->Db->qstr($this->sc_field_0_), 1, -1); 
          $this->sc_field_1__before_qstr = $this->sc_field_1_;
          $this->sc_field_1_ = substr($this->Db->qstr($this->sc_field_1_), 1, -1); 
          $this->comuna__before_qstr = $this->comuna_;
          $this->comuna_ = substr($this->Db->qstr($this->comuna_), 1, -1); 
          $this->sc_field_2__before_qstr = $this->sc_field_2_;
          $this->sc_field_2_ = substr($this->Db->qstr($this->sc_field_2_), 1, -1); 
          $this->sc_field_3__before_qstr = $this->sc_field_3_;
          $this->sc_field_3_ = substr($this->Db->qstr($this->sc_field_3_), 1, -1); 
          $this->agenda__before_qstr = $this->agenda_;
          $this->agenda_ = substr($this->Db->qstr($this->agenda_), 1, -1); 
          $this->rce__before_qstr = $this->rce_;
          $this->rce_ = substr($this->Db->qstr($this->rce_), 1, -1); 
          $this->indicaciones__before_qstr = $this->indicaciones_;
          $this->indicaciones_ = substr($this->Db->qstr($this->indicaciones_), 1, -1); 
          $this->dental__before_qstr = $this->dental_;
          $this->dental_ = substr($this->Db->qstr($this->dental_), 1, -1); 
          $this->sc_field_4__before_qstr = $this->sc_field_4_;
          $this->sc_field_4_ = substr($this->Db->qstr($this->sc_field_4_), 1, -1); 
          $this->sc_field_5__before_qstr = $this->sc_field_5_;
          $this->sc_field_5_ = substr($this->Db->qstr($this->sc_field_5_), 1, -1); 
          $this->rce_1__before_qstr = $this->rce_1_;
          $this->rce_1_ = substr($this->Db->qstr($this->rce_1_), 1, -1); 
          $this->indicaciones_1__before_qstr = $this->indicaciones_1_;
          $this->indicaciones_1_ = substr($this->Db->qstr($this->indicaciones_1_), 1, -1); 
          $this->sc_field_6__before_qstr = $this->sc_field_6_;
          $this->sc_field_6_ = substr($this->Db->qstr($this->sc_field_6_), 1, -1); 
          $this->rce_2__before_qstr = $this->rce_2_;
          $this->rce_2_ = substr($this->Db->qstr($this->rce_2_), 1, -1); 
          $this->indicaciones_2__before_qstr = $this->indicaciones_2_;
          $this->indicaciones_2_ = substr($this->Db->qstr($this->indicaciones_2_), 1, -1); 
          $this->triage__before_qstr = $this->triage_;
          $this->triage_ = substr($this->Db->qstr($this->triage_), 1, -1); 
          $this->sc_field_7__before_qstr = $this->sc_field_7_;
          $this->sc_field_7_ = substr($this->Db->qstr($this->sc_field_7_), 1, -1); 
          $this->sc_field_8__before_qstr = $this->sc_field_8_;
          $this->sc_field_8_ = substr($this->Db->qstr($this->sc_field_8_), 1, -1); 
          $this->sc_field_9__before_qstr = $this->sc_field_9_;
          $this->sc_field_9_ = substr($this->Db->qstr($this->sc_field_9_), 1, -1); 
          $this->dispensacion__before_qstr = $this->dispensacion_;
          $this->dispensacion_ = substr($this->Db->qstr($this->dispensacion_), 1, -1); 
          $this->sc_field_10__before_qstr = $this->sc_field_10_;
          $this->sc_field_10_ = substr($this->Db->qstr($this->sc_field_10_), 1, -1); 
          $this->laboratorio__before_qstr = $this->laboratorio_;
          $this->laboratorio_ = substr($this->Db->qstr($this->laboratorio_), 1, -1); 
          $this->sc_field_11__before_qstr = $this->sc_field_11_;
          $this->sc_field_11_ = substr($this->Db->qstr($this->sc_field_11_), 1, -1); 
          $this->sc_field_12__before_qstr = $this->sc_field_12_;
          $this->sc_field_12_ = substr($this->Db->qstr($this->sc_field_12_), 1, -1); 
          $this->erp__before_qstr = $this->erp_;
          $this->erp_ = substr($this->Db->qstr($this->erp_), 1, -1); 
          $this->pabellon__before_qstr = $this->pabellon_;
          $this->pabellon_ = substr($this->Db->qstr($this->pabellon_), 1, -1); 
          $this->maternidad__before_qstr = $this->maternidad_;
          $this->maternidad_ = substr($this->Db->qstr($this->maternidad_), 1, -1); 
          $this->archivo__before_qstr = $this->archivo_;
          $this->archivo_ = substr($this->Db->qstr($this->archivo_), 1, -1); 
          $this->lme__before_qstr = $this->lme_;
          $this->lme_ = substr($this->Db->qstr($this->lme_), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id_ ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id_ "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_tbl_georref_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET `codigo deis nuevo` = '$this->sc_field_0_', `codigo deis antiguo` = '$this->sc_field_1_', COMUNA = '$this->comuna_', `Nivel de atencion` = '$this->sc_field_2_', `Nombre oficial` = '$this->sc_field_3_', Agenda = '$this->agenda_', RCE = '$this->rce_', Indicaciones = '$this->indicaciones_', Dental = '$this->dental_', `Registro/Admision` = '$this->sc_field_4_', `Administracion de camas` = '$this->sc_field_5_', RCE_1 = '$this->rce_1_', Indicaciones_1 = '$this->indicaciones_1_', `Registro/Admision_1` = '$this->sc_field_6_', RCE_2 = '$this->rce_2_', Indicaciones_2 = '$this->indicaciones_2_', Triage = '$this->triage_', `Mapa de Piso` = '$this->sc_field_7_', `Solicitud de Camas` = '$this->sc_field_8_', `Alta Pacientes` = '$this->sc_field_9_', Dispensacion = '$this->dispensacion_', `Control Stock` = '$this->sc_field_10_', Laboratorio = '$this->laboratorio_', `RIS/PACS` = '$this->sc_field_11_', `Validacion FONASA` = '$this->sc_field_12_', ERP = '$this->erp_', Pabellon = '$this->pabellon_', Maternidad = '$this->maternidad_', Archivo = '$this->archivo_', LME = '$this->lme_'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET `codigo deis nuevo` = '$this->sc_field_0_', `codigo deis antiguo` = '$this->sc_field_1_', COMUNA = '$this->comuna_', `Nivel de atencion` = '$this->sc_field_2_', `Nombre oficial` = '$this->sc_field_3_', Agenda = '$this->agenda_', RCE = '$this->rce_', Indicaciones = '$this->indicaciones_', Dental = '$this->dental_', `Registro/Admision` = '$this->sc_field_4_', `Administracion de camas` = '$this->sc_field_5_', RCE_1 = '$this->rce_1_', Indicaciones_1 = '$this->indicaciones_1_', `Registro/Admision_1` = '$this->sc_field_6_', RCE_2 = '$this->rce_2_', Indicaciones_2 = '$this->indicaciones_2_', Triage = '$this->triage_', `Mapa de Piso` = '$this->sc_field_7_', `Solicitud de Camas` = '$this->sc_field_8_', `Alta Pacientes` = '$this->sc_field_9_', Dispensacion = '$this->dispensacion_', `Control Stock` = '$this->sc_field_10_', Laboratorio = '$this->laboratorio_', `RIS/PACS` = '$this->sc_field_11_', `Validacion FONASA` = '$this->sc_field_12_', ERP = '$this->erp_', Pabellon = '$this->pabellon_', Maternidad = '$this->maternidad_', Archivo = '$this->archivo_', LME = '$this->lme_'";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE id = $this->id_ ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_tbl_georref_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->sc_field_0_ = $this->sc_field_0__before_qstr;
          $this->sc_field_1_ = $this->sc_field_1__before_qstr;
          $this->comuna_ = $this->comuna__before_qstr;
          $this->sc_field_2_ = $this->sc_field_2__before_qstr;
          $this->sc_field_3_ = $this->sc_field_3__before_qstr;
          $this->agenda_ = $this->agenda__before_qstr;
          $this->rce_ = $this->rce__before_qstr;
          $this->indicaciones_ = $this->indicaciones__before_qstr;
          $this->dental_ = $this->dental__before_qstr;
          $this->sc_field_4_ = $this->sc_field_4__before_qstr;
          $this->sc_field_5_ = $this->sc_field_5__before_qstr;
          $this->rce_1_ = $this->rce_1__before_qstr;
          $this->indicaciones_1_ = $this->indicaciones_1__before_qstr;
          $this->sc_field_6_ = $this->sc_field_6__before_qstr;
          $this->rce_2_ = $this->rce_2__before_qstr;
          $this->indicaciones_2_ = $this->indicaciones_2__before_qstr;
          $this->triage_ = $this->triage__before_qstr;
          $this->sc_field_7_ = $this->sc_field_7__before_qstr;
          $this->sc_field_8_ = $this->sc_field_8__before_qstr;
          $this->sc_field_9_ = $this->sc_field_9__before_qstr;
          $this->dispensacion_ = $this->dispensacion__before_qstr;
          $this->sc_field_10_ = $this->sc_field_10__before_qstr;
          $this->laboratorio_ = $this->laboratorio__before_qstr;
          $this->sc_field_11_ = $this->sc_field_11__before_qstr;
          $this->sc_field_12_ = $this->sc_field_12__before_qstr;
          $this->erp_ = $this->erp__before_qstr;
          $this->pabellon_ = $this->pabellon__before_qstr;
          $this->maternidad_ = $this->maternidad__before_qstr;
          $this->archivo_ = $this->archivo__before_qstr;
          $this->lme_ = $this->lme__before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['db_changed'] = true;

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['id_'])) { $this->id_ = $NM_val_form['id_']; }
              elseif (isset($this->id_)) { $this->nm_limpa_alfa($this->id_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_0_'])) { $this->sc_field_0_ = $NM_val_form['sc_field_0_']; }
              elseif (isset($this->sc_field_0_)) { $this->nm_limpa_alfa($this->sc_field_0_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_1_'])) { $this->sc_field_1_ = $NM_val_form['sc_field_1_']; }
              elseif (isset($this->sc_field_1_)) { $this->nm_limpa_alfa($this->sc_field_1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['comuna_'])) { $this->comuna_ = $NM_val_form['comuna_']; }
              elseif (isset($this->comuna_)) { $this->nm_limpa_alfa($this->comuna_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_2_'])) { $this->sc_field_2_ = $NM_val_form['sc_field_2_']; }
              elseif (isset($this->sc_field_2_)) { $this->nm_limpa_alfa($this->sc_field_2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_3_'])) { $this->sc_field_3_ = $NM_val_form['sc_field_3_']; }
              elseif (isset($this->sc_field_3_)) { $this->nm_limpa_alfa($this->sc_field_3_); }
              if     (isset($NM_val_form) && isset($NM_val_form['agenda_'])) { $this->agenda_ = $NM_val_form['agenda_']; }
              elseif (isset($this->agenda_)) { $this->nm_limpa_alfa($this->agenda_); }
              if     (isset($NM_val_form) && isset($NM_val_form['rce_'])) { $this->rce_ = $NM_val_form['rce_']; }
              elseif (isset($this->rce_)) { $this->nm_limpa_alfa($this->rce_); }
              if     (isset($NM_val_form) && isset($NM_val_form['indicaciones_'])) { $this->indicaciones_ = $NM_val_form['indicaciones_']; }
              elseif (isset($this->indicaciones_)) { $this->nm_limpa_alfa($this->indicaciones_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dental_'])) { $this->dental_ = $NM_val_form['dental_']; }
              elseif (isset($this->dental_)) { $this->nm_limpa_alfa($this->dental_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_4_'])) { $this->sc_field_4_ = $NM_val_form['sc_field_4_']; }
              elseif (isset($this->sc_field_4_)) { $this->nm_limpa_alfa($this->sc_field_4_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_5_'])) { $this->sc_field_5_ = $NM_val_form['sc_field_5_']; }
              elseif (isset($this->sc_field_5_)) { $this->nm_limpa_alfa($this->sc_field_5_); }
              if     (isset($NM_val_form) && isset($NM_val_form['rce_1_'])) { $this->rce_1_ = $NM_val_form['rce_1_']; }
              elseif (isset($this->rce_1_)) { $this->nm_limpa_alfa($this->rce_1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['indicaciones_1_'])) { $this->indicaciones_1_ = $NM_val_form['indicaciones_1_']; }
              elseif (isset($this->indicaciones_1_)) { $this->nm_limpa_alfa($this->indicaciones_1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_6_'])) { $this->sc_field_6_ = $NM_val_form['sc_field_6_']; }
              elseif (isset($this->sc_field_6_)) { $this->nm_limpa_alfa($this->sc_field_6_); }
              if     (isset($NM_val_form) && isset($NM_val_form['rce_2_'])) { $this->rce_2_ = $NM_val_form['rce_2_']; }
              elseif (isset($this->rce_2_)) { $this->nm_limpa_alfa($this->rce_2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['indicaciones_2_'])) { $this->indicaciones_2_ = $NM_val_form['indicaciones_2_']; }
              elseif (isset($this->indicaciones_2_)) { $this->nm_limpa_alfa($this->indicaciones_2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['triage_'])) { $this->triage_ = $NM_val_form['triage_']; }
              elseif (isset($this->triage_)) { $this->nm_limpa_alfa($this->triage_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_7_'])) { $this->sc_field_7_ = $NM_val_form['sc_field_7_']; }
              elseif (isset($this->sc_field_7_)) { $this->nm_limpa_alfa($this->sc_field_7_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_8_'])) { $this->sc_field_8_ = $NM_val_form['sc_field_8_']; }
              elseif (isset($this->sc_field_8_)) { $this->nm_limpa_alfa($this->sc_field_8_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_9_'])) { $this->sc_field_9_ = $NM_val_form['sc_field_9_']; }
              elseif (isset($this->sc_field_9_)) { $this->nm_limpa_alfa($this->sc_field_9_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dispensacion_'])) { $this->dispensacion_ = $NM_val_form['dispensacion_']; }
              elseif (isset($this->dispensacion_)) { $this->nm_limpa_alfa($this->dispensacion_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_10_'])) { $this->sc_field_10_ = $NM_val_form['sc_field_10_']; }
              elseif (isset($this->sc_field_10_)) { $this->nm_limpa_alfa($this->sc_field_10_); }
              if     (isset($NM_val_form) && isset($NM_val_form['laboratorio_'])) { $this->laboratorio_ = $NM_val_form['laboratorio_']; }
              elseif (isset($this->laboratorio_)) { $this->nm_limpa_alfa($this->laboratorio_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_11_'])) { $this->sc_field_11_ = $NM_val_form['sc_field_11_']; }
              elseif (isset($this->sc_field_11_)) { $this->nm_limpa_alfa($this->sc_field_11_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_12_'])) { $this->sc_field_12_ = $NM_val_form['sc_field_12_']; }
              elseif (isset($this->sc_field_12_)) { $this->nm_limpa_alfa($this->sc_field_12_); }
              if     (isset($NM_val_form) && isset($NM_val_form['erp_'])) { $this->erp_ = $NM_val_form['erp_']; }
              elseif (isset($this->erp_)) { $this->nm_limpa_alfa($this->erp_); }
              if     (isset($NM_val_form) && isset($NM_val_form['pabellon_'])) { $this->pabellon_ = $NM_val_form['pabellon_']; }
              elseif (isset($this->pabellon_)) { $this->nm_limpa_alfa($this->pabellon_); }
              if     (isset($NM_val_form) && isset($NM_val_form['maternidad_'])) { $this->maternidad_ = $NM_val_form['maternidad_']; }
              elseif (isset($this->maternidad_)) { $this->nm_limpa_alfa($this->maternidad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['archivo_'])) { $this->archivo_ = $NM_val_form['archivo_']; }
              elseif (isset($this->archivo_)) { $this->nm_limpa_alfa($this->archivo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['lme_'])) { $this->lme_ = $NM_val_form['lme_']; }
              elseif (isset($this->lme_)) { $this->nm_limpa_alfa($this->lme_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_', 'sc_field_0_', 'sc_field_1_', 'comuna_', 'sc_field_2_', 'sc_field_3_', 'agenda_', 'rce_', 'indicaciones_', 'dental_', 'sc_field_4_', 'sc_field_5_', 'rce_1_', 'indicaciones_1_', 'sc_field_6_', 'rce_2_', 'indicaciones_2_', 'triage_', 'sc_field_7_', 'sc_field_8_', 'sc_field_9_', 'dispensacion_', 'sc_field_10_', 'laboratorio_', 'sc_field_11_', 'sc_field_12_', 'erp_', 'pabellon_', 'maternidad_', 'archivo_', 'lme_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_0_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['comuna_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_3_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['agenda_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['rce_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['indicaciones_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dental_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_4_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_5_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['rce_1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['indicaciones_1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_6_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['rce_2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['indicaciones_2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['triage_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_7_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_8_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_9_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dispensacion_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_10_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['laboratorio_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_11_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sc_field_12_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['erp_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['pabellon_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['maternidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['archivo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['lme_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "`codigo deis nuevo`, `codigo deis antiguo`, COMUNA, `Nivel de atencion`, `Nombre oficial`, Agenda, RCE, Indicaciones, Dental, `Registro/Admision`, `Administracion de camas`, RCE_1, Indicaciones_1, `Registro/Admision_1`, RCE_2, Indicaciones_2, Triage, `Mapa de Piso`, `Solicitud de Camas`, `Alta Pacientes`, Dispensacion, `Control Stock`, Laboratorio, `RIS/PACS`, `Validacion FONASA`, ERP, Pabellon, Maternidad, Archivo, LME) VALUES (" . $NM_seq_auto . "'$this->sc_field_0_', '$this->sc_field_1_', '$this->comuna_', '$this->sc_field_2_', '$this->sc_field_3_', '$this->agenda_', '$this->rce_', '$this->indicaciones_', '$this->dental_', '$this->sc_field_4_', '$this->sc_field_5_', '$this->rce_1_', '$this->indicaciones_1_', '$this->sc_field_6_', '$this->rce_2_', '$this->indicaciones_2_', '$this->triage_', '$this->sc_field_7_', '$this->sc_field_8_', '$this->sc_field_9_', '$this->dispensacion_', '$this->sc_field_10_', '$this->laboratorio_', '$this->sc_field_11_', '$this->sc_field_12_', '$this->erp_', '$this->pabellon_', '$this->maternidad_', '$this->archivo_', '$this->lme_')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "`codigo deis nuevo`, `codigo deis antiguo`, COMUNA, `Nivel de atencion`, `Nombre oficial`, Agenda, RCE, Indicaciones, Dental, `Registro/Admision`, `Administracion de camas`, RCE_1, Indicaciones_1, `Registro/Admision_1`, RCE_2, Indicaciones_2, Triage, `Mapa de Piso`, `Solicitud de Camas`, `Alta Pacientes`, Dispensacion, `Control Stock`, Laboratorio, `RIS/PACS`, `Validacion FONASA`, ERP, Pabellon, Maternidad, Archivo, LME) VALUES (" . $NM_seq_auto . "'$this->sc_field_0_', '$this->sc_field_1_', '$this->comuna_', '$this->sc_field_2_', '$this->sc_field_3_', '$this->agenda_', '$this->rce_', '$this->indicaciones_', '$this->dental_', '$this->sc_field_4_', '$this->sc_field_5_', '$this->rce_1_', '$this->indicaciones_1_', '$this->sc_field_6_', '$this->rce_2_', '$this->indicaciones_2_', '$this->triage_', '$this->sc_field_7_', '$this->sc_field_8_', '$this->sc_field_9_', '$this->dispensacion_', '$this->sc_field_10_', '$this->laboratorio_', '$this->sc_field_11_', '$this->sc_field_12_', '$this->erp_', '$this->pabellon_', '$this->maternidad_', '$this->archivo_', '$this->lme_')"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_tbl_georref_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_I_E']++; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['id_'] = $this->id_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_0_'] = $this->sc_field_0_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_1_'] = $this->sc_field_1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['comuna_'] = $this->comuna_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_2_'] = $this->sc_field_2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_3_'] = $this->sc_field_3_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['agenda_'] = $this->agenda_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['rce_'] = $this->rce_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['indicaciones_'] = $this->indicaciones_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['dental_'] = $this->dental_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_4_'] = $this->sc_field_4_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_5_'] = $this->sc_field_5_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['rce_1_'] = $this->rce_1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['indicaciones_1_'] = $this->indicaciones_1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_6_'] = $this->sc_field_6_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['rce_2_'] = $this->rce_2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['indicaciones_2_'] = $this->indicaciones_2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['triage_'] = $this->triage_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_7_'] = $this->sc_field_7_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_8_'] = $this->sc_field_8_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_9_'] = $this->sc_field_9_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['dispensacion_'] = $this->dispensacion_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_10_'] = $this->sc_field_10_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['laboratorio_'] = $this->laboratorio_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_11_'] = $this->sc_field_11_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['sc_field_12_'] = $this->sc_field_12_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['erp_'] = $this->erp_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['pabellon_'] = $this->pabellon_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['maternidad_'] = $this->maternidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['archivo_'] = $this->archivo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert]['lme_'] = $this->lme_;
              if (!empty($this->sc_force_zero))
              {
                  foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
                  {
                      eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
                  }
              }
              $this->sc_force_zero = array();
              if (!empty($NM_val_null))
              {
                  foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
                  {
                      eval('$this->' . $sc_val_null_field . ' = "";');
                  }
              }
              if (isset($this->id_)) { $this->nm_limpa_alfa($this->id_); }
              if (isset($this->sc_field_0_)) { $this->nm_limpa_alfa($this->sc_field_0_); }
              if (isset($this->sc_field_1_)) { $this->nm_limpa_alfa($this->sc_field_1_); }
              if (isset($this->comuna_)) { $this->nm_limpa_alfa($this->comuna_); }
              if (isset($this->sc_field_2_)) { $this->nm_limpa_alfa($this->sc_field_2_); }
              if (isset($this->sc_field_3_)) { $this->nm_limpa_alfa($this->sc_field_3_); }
              if (isset($this->agenda_)) { $this->nm_limpa_alfa($this->agenda_); }
              if (isset($this->rce_)) { $this->nm_limpa_alfa($this->rce_); }
              if (isset($this->indicaciones_)) { $this->nm_limpa_alfa($this->indicaciones_); }
              if (isset($this->dental_)) { $this->nm_limpa_alfa($this->dental_); }
              if (isset($this->sc_field_4_)) { $this->nm_limpa_alfa($this->sc_field_4_); }
              if (isset($this->sc_field_5_)) { $this->nm_limpa_alfa($this->sc_field_5_); }
              if (isset($this->rce_1_)) { $this->nm_limpa_alfa($this->rce_1_); }
              if (isset($this->indicaciones_1_)) { $this->nm_limpa_alfa($this->indicaciones_1_); }
              if (isset($this->sc_field_6_)) { $this->nm_limpa_alfa($this->sc_field_6_); }
              if (isset($this->rce_2_)) { $this->nm_limpa_alfa($this->rce_2_); }
              if (isset($this->indicaciones_2_)) { $this->nm_limpa_alfa($this->indicaciones_2_); }
              if (isset($this->triage_)) { $this->nm_limpa_alfa($this->triage_); }
              if (isset($this->sc_field_7_)) { $this->nm_limpa_alfa($this->sc_field_7_); }
              if (isset($this->sc_field_8_)) { $this->nm_limpa_alfa($this->sc_field_8_); }
              if (isset($this->sc_field_9_)) { $this->nm_limpa_alfa($this->sc_field_9_); }
              if (isset($this->dispensacion_)) { $this->nm_limpa_alfa($this->dispensacion_); }
              if (isset($this->sc_field_10_)) { $this->nm_limpa_alfa($this->sc_field_10_); }
              if (isset($this->laboratorio_)) { $this->nm_limpa_alfa($this->laboratorio_); }
              if (isset($this->sc_field_11_)) { $this->nm_limpa_alfa($this->sc_field_11_); }
              if (isset($this->sc_field_12_)) { $this->nm_limpa_alfa($this->sc_field_12_); }
              if (isset($this->erp_)) { $this->nm_limpa_alfa($this->erp_); }
              if (isset($this->pabellon_)) { $this->nm_limpa_alfa($this->pabellon_); }
              if (isset($this->maternidad_)) { $this->nm_limpa_alfa($this->maternidad_); }
              if (isset($this->archivo_)) { $this->nm_limpa_alfa($this->archivo_); }
              if (isset($this->lme_)) { $this->nm_limpa_alfa($this->lme_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['id_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['id_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_));
                  $this->NM_ajax_info['fldList']['id_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_id_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_0_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_0_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_0_));
                  $this->NM_ajax_info['fldList']['sc_field_0_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_0_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_0_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_0_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_0_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_0_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_1_));
                  $this->NM_ajax_info['fldList']['sc_field_1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['comuna_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['comuna_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->comuna_));
                  $this->NM_ajax_info['fldList']['comuna_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_comuna_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['comuna_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['comuna_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['comuna_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['comuna_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_2_));
                  $this->NM_ajax_info['fldList']['sc_field_2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_2_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_3_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_3_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_3_));
                  $this->NM_ajax_info['fldList']['sc_field_3_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_3_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_3_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_3_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_3_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['agenda_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['agenda_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->agenda_));
                  $this->NM_ajax_info['fldList']['agenda_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_agenda_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['agenda_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['agenda_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['agenda_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['agenda_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['rce_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['rce_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->rce_));
                  $this->NM_ajax_info['fldList']['rce_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_rce_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['rce_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['rce_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['rce_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['rce_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['indicaciones_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['indicaciones_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->indicaciones_));
                  $this->NM_ajax_info['fldList']['indicaciones_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_indicaciones_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['indicaciones_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['indicaciones_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['indicaciones_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['indicaciones_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dental_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dental_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dental_));
                  $this->NM_ajax_info['fldList']['dental_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dental_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dental_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dental_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dental_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dental_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_4_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_4_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_4_));
                  $this->NM_ajax_info['fldList']['sc_field_4_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_4_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_4_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_4_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_4_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_4_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_5_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_5_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_5_));
                  $this->NM_ajax_info['fldList']['sc_field_5_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_5_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_5_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_5_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_5_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_5_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['rce_1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['rce_1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->rce_1_));
                  $this->NM_ajax_info['fldList']['rce_1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_rce_1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['rce_1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['rce_1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['rce_1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['rce_1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['indicaciones_1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['indicaciones_1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->indicaciones_1_));
                  $this->NM_ajax_info['fldList']['indicaciones_1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_indicaciones_1_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['indicaciones_1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['indicaciones_1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['indicaciones_1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['indicaciones_1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_6_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_6_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_6_));
                  $this->NM_ajax_info['fldList']['sc_field_6_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_6_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_6_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_6_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_6_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_6_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['rce_2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['rce_2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->rce_2_));
                  $this->NM_ajax_info['fldList']['rce_2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_rce_2_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['rce_2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['rce_2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['rce_2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['rce_2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['indicaciones_2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['indicaciones_2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->indicaciones_2_));
                  $this->NM_ajax_info['fldList']['indicaciones_2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_indicaciones_2_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['indicaciones_2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['indicaciones_2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['indicaciones_2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['indicaciones_2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['triage_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['triage_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->triage_));
                  $this->NM_ajax_info['fldList']['triage_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_triage_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['triage_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['triage_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['triage_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['triage_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_7_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_7_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_7_));
                  $this->NM_ajax_info['fldList']['sc_field_7_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_7_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_7_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_7_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_7_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_7_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_8_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_8_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_8_));
                  $this->NM_ajax_info['fldList']['sc_field_8_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_8_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_8_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_8_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_8_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_8_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_9_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_9_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_9_));
                  $this->NM_ajax_info['fldList']['sc_field_9_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_9_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_9_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_9_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_9_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_9_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dispensacion_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dispensacion_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->dispensacion_));
                  $this->NM_ajax_info['fldList']['dispensacion_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_dispensacion_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dispensacion_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dispensacion_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dispensacion_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dispensacion_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_10_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_10_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_10_));
                  $this->NM_ajax_info['fldList']['sc_field_10_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_10_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_10_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_10_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_10_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_10_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['laboratorio_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['laboratorio_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->laboratorio_));
                  $this->NM_ajax_info['fldList']['laboratorio_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_laboratorio_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['laboratorio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['laboratorio_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['laboratorio_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['laboratorio_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_11_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_11_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_11_));
                  $this->NM_ajax_info['fldList']['sc_field_11_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_11_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_11_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_11_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_11_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_11_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['sc_field_12_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sc_field_12_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->sc_field_12_));
                  $this->NM_ajax_info['fldList']['sc_field_12_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_sc_field_12_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_12_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_12_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sc_field_12_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sc_field_12_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['erp_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['erp_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->erp_));
                  $this->NM_ajax_info['fldList']['erp_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_erp_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['erp_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['erp_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['erp_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['erp_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['pabellon_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['pabellon_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->pabellon_));
                  $this->NM_ajax_info['fldList']['pabellon_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_pabellon_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pabellon_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pabellon_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['pabellon_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['pabellon_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['maternidad_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['maternidad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->maternidad_));
                  $this->NM_ajax_info['fldList']['maternidad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_maternidad_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['maternidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['maternidad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['maternidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['maternidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['archivo_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['archivo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->archivo_));
                  $this->NM_ajax_info['fldList']['archivo_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_archivo_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['archivo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['archivo_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['archivo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['archivo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['lme_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['lme_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->lme_));
                  $this->NM_ajax_info['fldList']['lme_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_lme_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['lme_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['lme_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['lme_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['lme_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_ = substr($this->Db->qstr($this->id_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id_"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where id = $this->id_ "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id_ "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id_ "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbl_georref_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_I_E']--; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_excl = true; 
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['parms'] = "id_?#?$this->id_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_ = substr($this->Db->qstr($this->id_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_tbl_georref']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_tbl_georref = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['parms'] = ""; 
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->id_)
          {
              $aNewWhereCond[] = "id = " . $this->id_;
          }
          if (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total']))
          {
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_tbl_georref = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'] = $qt_geral_reg_form_tbl_georref;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_))
          {
              $Key_Where = "id < $this->id_ "; 
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbl_georref = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_tbl_georref) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] > $qt_geral_reg_form_tbl_georref)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = $qt_geral_reg_form_tbl_georref - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = ($qt_geral_reg_form_tbl_georref + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "id";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['ordem_ord']; 
      } 
      $nmgp_select = "SELECT id, `codigo deis nuevo` as sc_field_0_, `codigo deis antiguo` as sc_field_1_, COMUNA, `Nivel de atencion` as sc_field_2_, `Nombre oficial` as sc_field_3_, Agenda, RCE, Indicaciones, Dental, `Registro/Admision` as sc_field_4_, `Administracion de camas` as sc_field_5_, RCE_1, Indicaciones_1, `Registro/Admision_1` as sc_field_6_, RCE_2, Indicaciones_2, Triage, `Mapa de Piso` as sc_field_7_, `Solicitud de Camas` as sc_field_8_, `Alta Pacientes` as sc_field_9_, Dispensacion, `Control Stock` as sc_field_10_, Laboratorio, `RIS/PACS` as sc_field_11_, `Validacion FONASA` as sc_field_12_, ERP, Pabellon, Maternidad, Archivo, LME from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start']) ;  
                  } 
              } 
          } 
      }
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF && !$this->proc_fast_search && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter'])) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              $this->nmgp_botoes['mapa_ti'] = "on";
              $this->nmgp_botoes['Volver'] = "off";
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->id_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_'] = $this->id_;
              $this->sc_field_0_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['sc_field_0_'] = $this->sc_field_0_;
              $this->sc_field_1_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['sc_field_1_'] = $this->sc_field_1_;
              $this->comuna_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['comuna_'] = $this->comuna_;
              $this->sc_field_2_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['sc_field_2_'] = $this->sc_field_2_;
              $this->sc_field_3_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['sc_field_3_'] = $this->sc_field_3_;
              $this->agenda_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['agenda_'] = $this->agenda_;
              $this->rce_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['rce_'] = $this->rce_;
              $this->indicaciones_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['indicaciones_'] = $this->indicaciones_;
              $this->dental_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['dental_'] = $this->dental_;
              $this->sc_field_4_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['sc_field_4_'] = $this->sc_field_4_;
              $this->sc_field_5_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['sc_field_5_'] = $this->sc_field_5_;
              $this->rce_1_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['rce_1_'] = $this->rce_1_;
              $this->indicaciones_1_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['indicaciones_1_'] = $this->indicaciones_1_;
              $this->sc_field_6_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['sc_field_6_'] = $this->sc_field_6_;
              $this->rce_2_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['rce_2_'] = $this->rce_2_;
              $this->indicaciones_2_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['indicaciones_2_'] = $this->indicaciones_2_;
              $this->triage_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['triage_'] = $this->triage_;
              $this->sc_field_7_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['sc_field_7_'] = $this->sc_field_7_;
              $this->sc_field_8_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['sc_field_8_'] = $this->sc_field_8_;
              $this->sc_field_9_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['sc_field_9_'] = $this->sc_field_9_;
              $this->dispensacion_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['dispensacion_'] = $this->dispensacion_;
              $this->sc_field_10_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['sc_field_10_'] = $this->sc_field_10_;
              $this->laboratorio_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['laboratorio_'] = $this->laboratorio_;
              $this->sc_field_11_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['sc_field_11_'] = $this->sc_field_11_;
              $this->sc_field_12_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['sc_field_12_'] = $this->sc_field_12_;
              $this->erp_ = $rs->fields[26] ; 
              $this->nmgp_dados_select['erp_'] = $this->erp_;
              $this->pabellon_ = $rs->fields[27] ; 
              $this->nmgp_dados_select['pabellon_'] = $this->pabellon_;
              $this->maternidad_ = $rs->fields[28] ; 
              $this->nmgp_dados_select['maternidad_'] = $this->maternidad_;
              $this->archivo_ = $rs->fields[29] ; 
              $this->nmgp_dados_select['archivo_'] = $this->archivo_;
              $this->lme_ = $rs->fields[30] ; 
              $this->nmgp_dados_select['lme_'] = $this->lme_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_ = (string)$this->id_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['parms'] = "id_?#?$this->id_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['id_'] =  $this->id_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_0_'] =  $this->sc_field_0_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_1_'] =  $this->sc_field_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['comuna_'] =  $this->comuna_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_2_'] =  $this->sc_field_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_3_'] =  $this->sc_field_3_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['agenda_'] =  $this->agenda_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_'] =  $this->rce_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_'] =  $this->indicaciones_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['dental_'] =  $this->dental_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_4_'] =  $this->sc_field_4_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_5_'] =  $this->sc_field_5_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_1_'] =  $this->rce_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_1_'] =  $this->indicaciones_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_6_'] =  $this->sc_field_6_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_2_'] =  $this->rce_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_2_'] =  $this->indicaciones_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['triage_'] =  $this->triage_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_7_'] =  $this->sc_field_7_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_8_'] =  $this->sc_field_8_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_9_'] =  $this->sc_field_9_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['dispensacion_'] =  $this->dispensacion_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_10_'] =  $this->sc_field_10_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['laboratorio_'] =  $this->laboratorio_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_11_'] =  $this->sc_field_11_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_12_'] =  $this->sc_field_12_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['erp_'] =  $this->erp_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['pabellon_'] =  $this->pabellon_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['maternidad_'] =  $this->maternidad_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['archivo_'] =  $this->archivo_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['lme_'] =  $this->lme_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_form_tbl_georref); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] < (($qt_geral_reg_form_tbl_georref + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->id_ = "";  
              $this->sc_field_0_ = "";  
              $this->sc_field_1_ = "";  
              $this->comuna_ = "";  
              $this->sc_field_2_ = "";  
              $this->sc_field_3_ = "";  
              $this->agenda_ = "";  
              $this->rce_ = "";  
              $this->indicaciones_ = "";  
              $this->dental_ = "";  
              $this->sc_field_4_ = "";  
              $this->sc_field_5_ = "";  
              $this->rce_1_ = "";  
              $this->indicaciones_1_ = "";  
              $this->sc_field_6_ = "";  
              $this->rce_2_ = "";  
              $this->indicaciones_2_ = "";  
              $this->triage_ = "";  
              $this->sc_field_7_ = "";  
              $this->sc_field_8_ = "";  
              $this->sc_field_9_ = "";  
              $this->dispensacion_ = "";  
              $this->sc_field_10_ = "";  
              $this->laboratorio_ = "";  
              $this->sc_field_11_ = "";  
              $this->sc_field_12_ = "";  
              $this->erp_ = "";  
              $this->pabellon_ = "";  
              $this->maternidad_ = "";  
              $this->archivo_ = "";  
              $this->lme_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['id_'] =  $this->id_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_0_'] =  $this->sc_field_0_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_1_'] =  $this->sc_field_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['comuna_'] =  $this->comuna_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_2_'] =  $this->sc_field_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_3_'] =  $this->sc_field_3_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['agenda_'] =  $this->agenda_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_'] =  $this->rce_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_'] =  $this->indicaciones_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['dental_'] =  $this->dental_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_4_'] =  $this->sc_field_4_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_5_'] =  $this->sc_field_5_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_1_'] =  $this->rce_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_1_'] =  $this->indicaciones_1_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_6_'] =  $this->sc_field_6_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['rce_2_'] =  $this->rce_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['indicaciones_2_'] =  $this->indicaciones_2_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['triage_'] =  $this->triage_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_7_'] =  $this->sc_field_7_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_8_'] =  $this->sc_field_8_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_9_'] =  $this->sc_field_9_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['dispensacion_'] =  $this->dispensacion_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_10_'] =  $this->sc_field_10_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['laboratorio_'] =  $this->laboratorio_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_11_'] =  $this->sc_field_11_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['sc_field_12_'] =  $this->sc_field_12_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['erp_'] =  $this->erp_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['pabellon_'] =  $this->pabellon_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['maternidad_'] =  $this->maternidad_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['archivo_'] =  $this->archivo_; 
             $this->form_vert_form_tbl_georref[$sc_seq_vert]['lme_'] =  $this->lme_; 
              $sc_seq_vert++; 
          } 
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
//
function scajaxbutton_Volver_onClick()
{
$_SESSION['scriptcase']['form_tbl_georref']['contr_erro'] = 'on';
   

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_tbl_archivos_1') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };

$this->nm_formatar_campos();
$this->nmgp_refresh_fields = array();
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
form_tbl_georref_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbl_georref']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbl_georref_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbl_georref_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`codigo deis nuevo`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`codigo deis antiguo`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "COMUNA", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Nivel de atencion`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Nombre oficial`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Agenda", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RCE", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Indicaciones", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Dental", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Registro/Admision`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Administracion de camas`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RCE_1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Indicaciones_1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Registro/Admision_1`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RCE_2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Indicaciones_2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Triage", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Mapa de Piso`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Solicitud de Camas`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Alta Pacientes`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Dispensacion", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Control Stock`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Laboratorio", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`RIS/PACS`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Validacion FONASA`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ERP", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Pabellon", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Maternidad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Archivo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "LME", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "id", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`codigo deis nuevo`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`codigo deis antiguo`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "COMUNA", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Nivel de atencion`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Nombre oficial`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Agenda", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RCE", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Indicaciones", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Dental", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Registro/Admision`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Administracion de camas`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RCE_1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Indicaciones_1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Registro/Admision_1`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RCE_2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Indicaciones_2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Triage", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Mapa de Piso`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Solicitud de Camas`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Alta Pacientes`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Dispensacion", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Control Stock`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Laboratorio", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`RIS/PACS`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Validacion FONASA`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ERP", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Pabellon", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Maternidad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Archivo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "LME", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_tbl_georref = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['total'] = $qt_geral_reg_form_tbl_georref;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbl_georref_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbl_georref_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_outra_jan'])
   {
       $nmgp_saida_form = "form_tbl_georref_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbl_georref_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_tbl_georref_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['masterValue']);
?>
}
<?php
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbl_georref']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_tbl_georref_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       form_tbl_georref_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
   </BODY>
   </HTML>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
