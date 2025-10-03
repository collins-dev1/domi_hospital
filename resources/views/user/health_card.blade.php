@extends('layouts.user_layout')

@section('content')
    @include('sweetalert::alert')
    <div id="health-card">
        <div class="page-header">
            <h1 class="page-title">My Health Card</h1>
            <p class="page-subtitle">Your digital health identification card</p>
        </div>
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Card History</h2>
                {{-- @if (!$card || $card->status == 0)
                    <button class="btn btn-primary" onclick="openModal('appointmentModal')">
                        <i class="fas fa-heartbeat"></i>Get Health Card
                    </button>
                @else
                    <h5>Already have a card</h5>
                @endif --}}
                @if (!$card)
                    <button class="btn btn-primary" onclick="openModal('appointmentModal')">
                        <i class="fas fa-heartbeat"></i>Get Health Card
                    </button>
                @elseif ($card->status == 0)
                   <a href="{{route('payment_option')}}">
                     <button class="btn btn-primary">
                        <i class="fas fa-heartbeat"></i>Make Payment
                    </button>
                   </a>
                @elseif ($card->status == 1)
                    <h5>Already have a card</h5>
                @else
                    <h5>Card Cancelled</h5>
                @endif
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Blood Group</th>
                        <th>Genotype</th>
                        <th>Allergies</th>
                        <th>Existing Condition</th>
                        <th>Past Medication</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cards as $card)
                        <tr>
                            <td>{{ $card->blood_group }}</td>
                            <td>{{ $card->genotype }}</td>
                            <td>{{ $card->allergies }}</td>
                            <td>{{ $card->existing_conditions }}</td>
                            <td>{{ $card->past_medications }}</td>
                            <td>
                                @if ($card->status == '0')
                                    <span class="status-badge status-completed">Pending</span>
                                @elseif($card->status == '1')
                                    <span class="status-badge status-confirmed">Approved</span>
                                @else
                                    <span class="status-badge status-pending">Cancelled</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit_card', $card->id) }}"
                                    onclick="return confirm('Are you sure you want to Edit this Health Card???')">
                                    <button class="btn"
                                        style="background-color: rgb(16, 85, 16); color:#fff;">Edit</button>
                                </a>
                                <a href="{{ route('delete_cards', $card->id) }}"
                                    onclick="return confirm('Are you sure you want to Delete this Health Card???')">
                                    <button class="btn"
                                        style="background-color: rgb(193, 25, 25); color:#fff">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (!$card)
            {{-- No card at all --}}
            <h5>You have no health card yet. Please click on the "Get Health Card" button to create one.</h5>
        @elseif ($card->status == 0)
            {{-- Card exists but pending --}}
            <div class="alert alert-info" role="alert" style="margin-top: 2rem;">
                Your health card is currently pending approval. Make Payment by Chatting us and Please wait for an administrator to review and approve your
                card.
            </div>
        @elseif ($card->status == 1)
            {{-- Approved card --}}
            <div class="content-section">
                <div class="health-card">
                    <div class="card-header"
                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                <img src="{{ asset('hospital_website/img/domilogo.png') }}" alt="" width="50"
                                    height="50">
                                <div>
                                    <h3 style="margin: 0; font-size: 1.3rem;">Domi Clinic</h3>
                                    <p style="font-size:0.5rem">....Bringing health to your doorsteps</p>
                                </div>
                            </div>
                            <p style="margin: 0; opacity: 0.8;">Digital Health Card</p>
                        </div>
                        <div>
                            <i class="fas fa-heartbeat" style="font-size: 3rem;"></i>
                        </div>
                    </div>

                    <div class="card-info-grid">
                        <div>
                            <div class="info-item">
                                <div class="info-label">Patient ID</div>
                                <div class="info-value">MED00 {{ $user->id }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Full Name</div>
                                <div class="info-value">{{ $user->name }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Email Address</div>
                                <div class="info-value">{{ $user->email }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Date of Birth</div>
                                <div class="info-value">{{ $user->dob }}</div>
                            </div>
                        </div>
                        <div>
                            <div class="info-item">
                                <div class="info-label">Blood Group</div>
                                <div class="info-value">{{ $card->blood_group }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Genotype</div>
                                <div class="info-value">{{ $card->genotype }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Phone Number</div>
                                <div class="info-value">{{ $user->phone }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Registration Date</div>
                                <div class="info-value">{{ $card->created_at->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Optional: other statuses like cancelled --}}
            <h5>Your health card request has been cancelled. Please contact support.</h5>
        @endif


    </div>

    <!-- Health Modal -->
    <div class="modal" id="appointmentModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Health Card</h3>
                <button class="close" onclick="closeModal('appointmentModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="appointmentForm" action="{{ route('create_health_card') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="department">Blood Group *</label>
                        <select name="blood_group" id="blood_group" required>
                            <option value="">-- Select Blood Group --</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="Unknown">Unknown</option>
                            <option value="Not Sure">Not Sure</option>
                        </select>


                    </div>
                    <div class="form-group">
                        <label for="department">Genotype *</label>
                        <select name="genotype" id="genotype" required>
                            <option value="">-- Select Genotype --</option>
                            <option value="AA">AA</option>
                            <option value="AS">AS</option>
                            <option value="SS">SS</option>
                            <option value="AC">AC</option>
                            <option value="SC">SC</option>
                            <option value="Unknown">Unknown</option>
                            <option value="Not Sure">Not Sure</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Allergies</label>
                        <input type="text" name="allergies" placeholder="E.g. Peanuts, Pollen">
                    </div>
                    <div class="form-group">
                        <label for="">Existing Conditions</label>
                        <input type="text" name="existing_conditions" placeholder="E.g. Diabetes, Hypertension">
                    </div>
                    <div class="form-group">
                        <label for="">Past Medication</label>
                        <input type="text" name="past_medications" placeholder="E.g. Insulin, Aspirin">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary text-center" style="width: 100%;">
                            <span class="btn-text text-center">Get Card</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Modal Functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }
    </script>
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
        }

        .modal-content {
            background: var(--white);
            margin: 5% auto;
            padding: 0;
            border-radius: 15px;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: var(--primary-color);
            color: var(--white);
            padding: 1.5rem;
            border-radius: 15px 15px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
        }

        .close {
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
    </style>
@endsection
