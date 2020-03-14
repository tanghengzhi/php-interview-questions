console.log(isPalindrome("level"));
console.log(isPalindrome("levels"));
console.log(isPalindrome("A car, a man, a maraca"));

function isPalindrome(str) {
    str = str.replace(/\W/g, "").toLowerCase();
    return str.split("").reverse().join("") == str;
}