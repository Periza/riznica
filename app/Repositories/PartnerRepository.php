namespace App\Repositories;

use App\Models\Partner;
use Illuminate\Support\Collection;

class PartnerRepository {
    
    public function create(array $data) : Partner {
        return Partner::create($data);
    }
}