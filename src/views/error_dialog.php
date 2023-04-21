{% extends 'base.html.twig'%}
{% block title %} Error {% endblock %}
{% block body %}
<!-- jQuery CDN for dialog boxes -->
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"> </script>
<!-- CSS -->
<style>
    .ui-widget-header {
        background: lightgreen;
        color: blue;
        font-size: 20px;
    }

    #dialog {
        text-align: center;
    }
</style>
<div id="dialog">••••••••
    <h2>Oop's Something Went Wrong</h2>
    <p>{{ message }}</p>
    <a href="/{{ nav_route }}">OK</a>
    {#    <button id="opener">Close Dialog</button>#}
</div>

<script>
    $(function() {
        $("#dialog").dialog({
            autoOpen: false
        });
        $("#dialog").dialog("open");

        $("#close_btn").click(function() {
            $("#dialog").dialog("close");
        });

    });
</script>

{% endblock %}