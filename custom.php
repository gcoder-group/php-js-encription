<html>
<head><title></title></head>
<body>
<?php 
	include 'class.php';
	$d = new jsEncode();
	$key  = '012';
	$enc = $d->encodeString('0x9630DD60b60D24784465d38b39B85841B67b88cE',$key);
	// result 3[Z 
	echo $enc;
	echo '<br />';
	// result Hello world!
	echo $d->encodeString($enc,$key);
?>	
<script type="text/javascript">
//~ function enc(str) {
    //~ var encoded = "";
    //~ for (i=0; i<str.length;i++) {
        //~ var a = str.charCodeAt(i);
        //~ var b = a ^ 123;    // bitwise XOR with any number, e.g. 123
        //~ encoded = encoded+String.fromCharCode(b);
    //~ }
    //~ return encoded;
//~ }
//~ var str = "hello world";
//~ var encoded = enc(str);
//~ console.log(encoded);           // shows encoded string
//~ console.log(enc(encoded));      // shows the original string again


var jsEncode = {
	encode: function (s, k) {
		var enc = "";
		var str = "";
		// make sure that input is string
		str = s.toString();
		for (var i = 0; i < s.length; i++) {
			// create block
			var a = s.charCodeAt(i);
			// bitwise XOR
			var b = a ^ k;
			enc = enc + String.fromCharCode(b);
		}
		return enc;
	}
};

//~ var e = jsEncode.encode("Hello world!","123");
//~ // result 3[Z 
//~ console.log(e);
//var d = jsEncode.encode('<?php echo $enc;?>',"123");
var d = jsEncode.encode('<?php echo $enc;?>','<?php echo $key;?>');
// result Hello world!
console.log(d);
</script>
</body>
</html>
