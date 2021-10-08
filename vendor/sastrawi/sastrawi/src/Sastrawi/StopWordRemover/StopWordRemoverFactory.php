<?php

namespace Sastrawi\StopWordRemover;

use Sastrawi\Dictionary\ArrayDictionary;

class StopWordRemoverFactory
{
    public function createStopWordRemover()
    {
        $stopWords = $this->getStopWords();

        $dictionary = new ArrayDictionary($stopWords);
        $stopWordRemover = new StopWordRemover($dictionary);

        return $stopWordRemover;
    }

    public function getStopWords()
    {
        return array(
            'yang','untuk', 'pada', 'ke', 'para', 'namun', 'menurut', 'antara', 'dia',
            'ia', 'seperti', 'jika', 'jika', 'sehingga', 'kembali', 'dan', 'tidak', 'ini', 'karena',
            'kepada', 'oleh', 'saat', 'harus', 'sementara', 'setelah', 'belum', 'kami', 'sekitar',
            'bagi', 'serta', 'di', 'dari', 'telah', 'sebagai', 'masih', 'hal', 'ketika', 'adalah',
            'itu', 'dalam', 'bisa', 'bahwa', 'atau', 'hanya', 'kita', 'dengan', 'akan', 'juga',
            'ada', 'mereka', 'sudah', 'saya', 'terhadap', 'secara', 'agar', 'lain', 'anda',
            'begitu', 'mengapa', 'kenapa', 'yaitu', 'yakni', 'daripada', 'itulah', 'lagi', 'maka',
            'tentang', 'demi', 'dimana', 'kemana', 'pula', 'sambil', 'sebelum', 'sesudah', 'supaya',
            'guna', 'kah', 'pun', 'sampai', 'sedangkan', 'selagi', 'sementara', 'tetapi', 'apakah',
            'kecuali', 'sebab', 'selain', 'seolah', 'seraya', 'seterusnya', 'tanpa', 'agak', 'boleh',
            'dapat', 'dsb', 'dst', 'dll', 'dahulu', 'dulunya', 'anu', 'demikian', 'tapi', 'ingin',
            'juga', 'nggak', 'mari', 'nanti', 'melainkan', 'oh', 'ok', 'seharusnya', 'sebetulnya',
            'setiap', 'setidaknya', 'sesuatu', 'pasti', 'saja', 'toh', 'ya', 'walau', 'tolong',
            'tentu', 'amat', 'apalagi', 'bagaimanapun','ahaha',"{none}","se","nya","\r\n", 
            "\"","\"","\\","“","”","”","&ldquo;","&rdquo;","'","_","-","+", 
            "(",")","#","<",">","/","",",",".","|",":",";","!","?","=","%","&","@","*","[","]","{","}", 
            "^","~","â","€","–","ª","ª","˜º","ï","¸","ð","ÿ","˜‡","»","‘","˜","…", 
            "š","«","™","¤","¢","¬","©","‰","&#039;","amp","ada","adalah","adanya","adapun", 
            "agak","agaknya","agar","akan","akankah","apa","apaan","apabila","apakah","apalagi","apatah","asal","asalkan","atas","atau", 
            "ataukah","ataupun","awal","awalnya","bagai","bagaikan","bagaimana","bagaimanakah", 
            "bagaimanapun","bagi","bagian","bahkan","bahwa","bahwasanya","#NAME?","bakal", 
            "bakalan","balik","banyak","bapak","baru","bawah","beberapa","begini","beginian", 
            "beginikah","beginilah","begitu","begitukah","begitulah","begitupun","bekerja","belakang", 
            "belakangan","belumlah","#NAME?","#NAME?","berbagai","#NAME?","berlalu", "berujar","berupa","#NAME?","biasa","biasanya","bila","bilakah","bisa","bisakah","boleh", 
            "bolehkah","bolehlah","#NAME?","bukan","bukankah","bukanlah","bukannya","bulan","bung","cara","caranya","cukup", 
            "cuma","dahulu","dalam","dan","dapat","dari","datang","dekat","demi","demikian","demikianlah","dengan","depan","di","dia","diakhiri","diakhirinya","dialah","diantara","#NAME?","dibuatnya","didapat","didatangkan","digunakan","diibaratkan","diibaratkannya","#NAME?","diingatkan","diinginkan","dijelaskan","dijelaskannya", 
            "dimaksudkan","dimaksudkannya","dimaksudnya","diminta","dimintai","dimisalkan","dimulai","dimulailah","dimulainya",'disinilah', 
            "dini","dipastikan","diperbuat","diperbuatnya","dipergunakan","diperkirakan","diperlihatkan","diperlukan","diperlukannya","dipersoalkan", 
            "#NAME?","#NAME?","diungkapkan","dong","#NAME?","enggak","enggaknya","entah","entahlah","gunakan","hal","hampir","hanya","hanyalah","hari","#NAME?", 
            "hendak","hingga","ialah","ibu","ikut","#NAME?","ini","itu", 
            "#NAME?","jadilah","jadinya","#NAME?","janganlah","jauh","jika","jikalau","juga","jumlah","jumlahnya", 
            "justru","kala","kalau","kalaulah","kalaupun","kalian","kami","kamilah","kamu","kamulah","kan","kapan","kapankah","kapanpun","karena","karenanya","#NAME?","ke", 
            "#NAME?","kira","kita","kitalah","kok","kurang","lagi","lagian","lah","lain","lainnya", "lalu","lama","lamanya","lanjut","lanjutnya","lewat","luar","macam","maka","makanya","malah","malahan","mampu","mampukah","mana","manakala","manalagi","#NAME?","masalah","masalahnya","masih","masihkah","masing","masing-masing","maupun",
            "melainkan","#NAME?","#NAME?","melihat","melihatnya","memang","memastikan","#NAME?","#NAME?","memerlukan","memihak","meminta","memintakan", 
            "memisalkan","memperbuat","mempergunakan","memperkirakan","memperlihatkan","mempersiapkan","mempersoalkan","mempertanyakan","mempunyai","memulai","memungkinkan","menaiki","menambahkan",
            "menandaskan","menanti","menanti-nanti","menantikan","menanya","menanyai","menanyakan","mendapat","mendapatkan", 
            "mendatang","mendatangi","mendatangkan","menegaskan","mengakhiri","mengapa",
            "mengenai","#NAME?","#NAME?","menginginkan","mengira","#NAME?", "menjelaskan","menuju","menunjuk","menunjuki","menunjukkan","menunjuknya","menurut","menuturkan","menyampaikan", 
            "menyangkut","menyatakan","menyebutkan","merasa","mereka","merekalah","merupakan", 
            "meski","meskipun","meyakini","meyakinkan","minta","misal","misalkan","misalnya","mula","mulai", 
            "mulailah","mulanya","mungkin","mungkinkah","nah","naik","namun","nanti","nantinya","nyaris","nyatanya", 
            "oleh","olehnya","pada","padahal","padanya","pak","per","#NAME?","persoalan","pertama", 
            "pertama-tama","pertanyakan","pihak","pihaknya","pula","pun","punya","rasa","rasanya","rata","saat","saatnya","saja","sajalah","saling","sama-sama","sambil","sampai", 
            "sampai-sampai","sana","saya","sebegini","sebegitu","sebelum","sebelumnya","sebenarnya","seberapa","sebesar","sebetulnya","sebisanya", 
            "sebuah","sebut","sebutlah","sebutnya","secara","secukupnya","sedang","sedangkan","sedemikian","sedikit", 
            "sedikitnya","seenaknya","sejak","sejauh","sejenak","sejumlah","sekadar","sekadarnya","sekali-kali","sekalian","sekaligus","sekalipun","sekarang", 
            "sekarang","seketika","sekiranya","sekitar","sekitarnya","sela","selain","selaku","selalu","selanjutnya","seluruh","seluruhnya",
            "semacam","semasa","semasih","semata","semata-mata","semaunya",
            "sementara","sempat","semula", 
            "seolah","seolah-olah","sepantasnya","sepantasnyalah","seperlunya","sesegera","sesekali", 
            "#NAME?","setempat","setengah","setiba","setibanya","setidak-tidaknya","siap","siapa","siapakah", 
            "siapapun","sini","sip","sinilah","soal","soalnya","suatu","sudah","sudahkah","sudahlah","supaya","tadi",
            "tadinya","tahu","tahun","tak","#NAME?","terakhir","terasa","terbanyak","terdahulu","terdapat", 
            "terdiri","#NAME?","tiap","tiba","tiba-tiba","tidakkah","tidaklah", 
            "toh","tunjuk","turut","tutur","tuturnya","#NAME?","ucapnya","ujar","ujarnya","umum", 
            "umumnya","ungkap","ungkapnya","untuk","usah","usai","waduh","wah","wahai","waktu","waktunya", 
            "walau","walaupun","wong","yaitu","yakin","yakni","yang","aca","bos","donk", 
            "aja","al","cak","cuy","dah","dear","dll","dunkz","ea","oke","yup","yg","mungkin",
            "ya","yaa","tdk","ta","terima","terima","tolong","ndak","assalamualaikum","sih",
            "iya","iiya","pusing","nah","dibenarkan","pada","thanx","bro","wr",
            "wb","dengan","lambat","lemot","ojo","pelit","kog","kyk","wb","mengaku", 
            "lo","mention","mu","quotes","by","tv","aktif","kudu","tp","browser","org","dh","knp", 
            "post","in","gt","#NAME?","mbak","mas","aq","mentionan","tangan","ali","theres","there", 
            "called","call","reply","suruh","quote","quot","retweet","tweet","{none}","heh","jg","bkn","gt","aja","dpt", "sok","alias", "jadi", "tuh", "sebenernya","tl","ken","jg", "wkwk","wkwkwkwkwkwk","wkwkwkwk",'wkwkwk','harusnya','gw','lu','gue','lo','lansung','lgsg','ato','gatau','nan','yg','km','sy','ga','gapunya','tu','loe','lu','krn','gak','ga','yg','entar','utk','sih','gk'
        );
    }
}
