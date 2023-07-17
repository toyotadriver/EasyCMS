<?php
function debtoc($data)
{
    switch (gettype($data))
        {
            case 'integer':
                $out = $data;
                break;
            case 'boolean':
                $out = ($data);
                break;
            case 'string':
                $out = $data;
                break;
            case 'array':
                $out = implode(',', $data);
                break;
            case 'double':
                $out = (string) $data;
                break;
            case 'object':
                $out = 'Object, I cant handle objects :(';
                break;
        }
    echo <<<_oc
    <script>console.log("Debug: $out")</script>
    _oc;
}
?>