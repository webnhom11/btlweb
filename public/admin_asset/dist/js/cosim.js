/*
    2016 - Ajay Ramesh
    ajayramesh@berkeley.edu
    ajayramesh.com

    Do whatever you want with it, happy hacking :)
*/

function buildStopwords(string) {
    /*
        Constructs a Set of stop words from a string.
        Stop words are common words the algorithm should ignore.

        Xây dựng một tập các từ dừng từ một chuỗi.
        Ngừng từ là những từ thông dụng thuật toán nên bỏ qua.
    */
    const stopWords = new Set();
    const wordArray = string.split('\n');
    for (word of wordArray) {
        stopWords.add(word);
    }
    return stopWords;
}

function sanitizeDoc(d, stopWords){
    d = d.toLowerCase();     // chuyển tất cả chuỗi thành chữ thường
    d = d.replace(/[^a-z ]/g, "");  //bỏ các kí tự khác chữ cái
    d = d.trim(); // loại bỏ toàn bộ khoảng trắng
    let a = d.split(" ");    // loại bỏ toàn bộ dấu cách
    let b = [];
    for (w of a) {
        if(!stopWords.has(w) && w.length > 0) {
            b.push(w);    // kiểm tra có phải từ kết thúc ko. nếu không thì thêm vào mảng. 
        }
    }
    return b.join(" "); // nối mảng thành chuỗi các nhau bởi dấu cách
}

function buildVectors(d1, d2) {

    /*
        Given two strings D1, D2, returns two word frequency vectors
        The length of the vector is the number of unique words that appear in
        both documents.
        Each indice of a vector is mapped to a unique word. Its value represents
        the frequency of the word in each respective vector.
        Ex:
        There are 6 unique words between D1, D2
        [fat, cat, sat, hat, lazy, dog]
        D1 = "fat cat sat hat" => [1, 1, 1, 1, 0, 0]
        D2 = "lazy dog sat hat" => [0, 0, 1, 1, 1, 1]
        inspired by http://stackoverflow.com/a/14948723/896112
    */

    function counter(d) {
        /*
            Given document D, constructs a dictionary of the form 
            {word: frequency}
        */
        const counts = new Map();  // Map là 1 mảng mà khi gọi 1 hàm sẽ tác động lên mọi phần tử trong mảng
        for (w of d.split(" ")) {
            if (w.length > 0) {
                if (!counts.has(w)) {  // kiểm tra trong dãy tổng xem có tồn tại tự đó ko.
                    counts.set(w, 0);   // Nếu chưa có thì cho nó có giá trị là 1
                }
                counts.set(w, counts.get(w)+1); // Nếu đã có thì tăng thêm giá trị của nó lên ( +1 mỗi lần xuất hiện)
            }
        }
     //   console.log(counts);
        return counts;
    }

    /*  Create Set of all unique words in both sentences
        Tạo Bộ tất cả các từ duy nhất trong cả hai câu */

    const allWords = new Set(); // Set là đối tượng cho phép lưu các giá trị duy nhất
    const d1Count = counter(d1);
    const d2Count = counter(d2);

    // Thêm giá trị vào allWords
    for (j of d1Count.keys()) {
        allWords.add(j);
    }

    for (k of d2Count.keys()) {
        allWords.add(k);
    }

    // allWords chỉ chứa toàn bộ các từ mà 2 chuỗi có và các từ này ko giống nhau
    //console.log(allWords);

    /*  Initialize two vectors of the same size
        Tính chiều dài 2 chuỗi */
    const vSize = allWords.size;
    const v1 = new Array(vSize);
    const v2 = new Array(vSize);

    /*  Populate vectors with frequency values
        Chuyển chuỗi về dạng vector [0, 1, 0, 1, 1,...] để so sánh*/
    let c = 0;
    for (w of allWords) {
        v1[c] = d1Count.get(w) || 0;
        v2[c] = d2Count.get(w) || 0;
        c++;
    }
 //   console.log(v1);
    return [v1, v2];
}


function cosim(v1, v2) {

    /* 
        The percentage similarity is the cosine of the angle between two vectors v1 and v2
        Let V be a vector and let |V| be its magnitude.
        The dot product between two vectors A, B is defined as:
        dot(A, B) = |A|*|B|*cos(theta)
        so...
        cos(theta) = (|A|*|B|) / dot(A, B)
        Ranges from 0 to 1

        Tỷ lệ phần trăm tương tự là cosin của góc giữa hai vectơ v1 và v2
            Hãy V là một vector và | V | được độ lớn của nó.
            Cosin giữa 2 vector có dạng
                cos(theta) = (|A|*|B|) / dot(A, B)
                tích vô hướng giữa 2 vector chia cho độ dài của chúng.

    */
    
    // tính tích vô hướng của 2 vector
    function dotProduct(v1, v2) { 
        s = 0;
        for (let i = 0; i < v1.length; i++) {
            s+=v1[i]*v2[i];
        }
        return s;
    }

    // tính độ dài của vector
    function magnitude(v) {
        s = 0;
        for (let i = 0; i < v.length; i++) {
            s+=Math.pow(v[i], 2);
        }
        return Math.sqrt(s);
    }

    return dotProduct(v1, v2) / (magnitude(v1) * magnitude(v2));
}