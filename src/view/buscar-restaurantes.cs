<!DOCTYPE html>
<html lang="pt-br">

dynamic GLOBALS = XVar.Array(), lista = null, logado = null;
			lista = XVar.Clone(GLOBALS["linhas"]);
			count = new XVar(0);
			CommonFunctions.session_start();
			if((XVar)(XSession.Session.KeyExists("logado"))  && (XVar)(XSession.Session["logado"] == true))
			{
				logado = new XVar(true);
			}
			else
			{
				logado = new XVar(false);
			}
			return null;