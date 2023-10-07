function unshiftDigits(shiftedValue) {
    let originalValue = "";
  
    for (let i = 0; i < shiftedValue.length; i++) {
      const char = shiftedValue[i];
  
      if (char >= "0" && char <= "9") {
        const digit = parseInt(char);
        const unshiftedDigit = (digit - 5 + 10) % 10;
        originalValue += unshiftedDigit.toString();
      } else {
        originalValue += char;
      }
    }
  
    return originalValue;
  }
  