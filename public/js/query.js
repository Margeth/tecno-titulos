const onlyNumber=(id)=>{
    const val = document.getElementById(id);
    var regExp = /^[0-9]+/i;
    var result= regExp.test(val.value);
    document.getElementById('sendQuery').disabled = !result;
};