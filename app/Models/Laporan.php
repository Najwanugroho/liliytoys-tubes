class Laporan extends Model
{
    protected $fillable = [
        'nama_permainan', 'harga', 'status_pembayaran', 'tanggal',
    ];

    protected $dates = ['tanggal']; // Memastikan tanggal diolah sebagai date
}
