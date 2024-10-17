<?php

# Membuat class Animal (atau nama alternatif yang diinginkan)
class Animal
{
    # Property animals
    private $animals;

    # Method constructor - mengisi data awal
    # Parameter: data hewan (array)
    public function __construct($data)
    {
        $this->animals = $data;
    }

    # Method index - menampilkan data animals
    public function index()
    {
        foreach ($this->animals as $animal) {
            echo $animal . '<br>';
        }
    }

    # Method store - menambahkan hewan baru
    # Parameter: hewan baru
    public function store($data)
    {
        array_push($this->animals, $data);
        echo "Hewan '$data' telah ditambahkan.<br>";
    }

    # Method update - mengupdate hewan
    # Parameter: index dan hewan baru
    public function update($index, $data)
    {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
            echo "Hewan di index $index telah diupdate menjadi '$data'.<br>";
        } else {
            echo "Index $index tidak ditemukan.<br>";
        }
    }

    # Method destroy - menghapus hewan
    # Parameter: index
    public function destroy($index)
    {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
            echo "Hewan di index $index telah dihapus.<br>";
            # Mengatur ulang array keys
            $this->animals = array_values($this->animals);
        } else {
            echo "Index $index tidak ditemukan.<br>";
        }
    }
}

# Membuat object
# Kirimkan data hewan (array) ke constructor
$animal = new Animal(['Tupai', 'Kangguru', 'Beruang']);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('Burung');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Tupai Terbang');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";
